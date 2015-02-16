<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\validators\UniqueValidator;

/**
 * UserController implements the CRUD actions for Users model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegistration()
    {
        $this->layout = 'login';
        $model = new Users();
		$model->scenario = 'registration';

		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
			Yii::$app->response->format = 'json';
			return \yii\widgets\ActiveForm::validate($model);
		}

        if ($model->load(Yii::$app->request->post())) {
			if( $model->validate() ){
				$model->password = \Yii::$app->getSecurity()->generatePasswordHash( $model->password );
				$model->authKey = \Yii::$app->security->generateRandomString(32);
				$model->accessToken = \Yii::$app->security->generateRandomString(64);
				if($model->save(false)){
					return $this->redirect(['site/login']);
				}
			}
        } else {
            return $this->render('registration', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Matches;
use app\models\Places;
use app\models\MatchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use app\components\AccessFilter;

/**
 * MatchController implements the CRUD actions for Matches model.
 */
class MatchController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessFilter::className(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Matches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matches model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $place = $model->place;
        return $this->render('view', [
            'model' => $model,
            'place' => $place,
        ]);
    }

    /**
     * Creates a new Matches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Matches();
        $places = Places::find()->all();
        $model->placeId = $places[0];
        $model->scenario = 'adminCreate';

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->date = $this->convertDateAndTimeToInt($model->onlyDate, $model->onlyTime);
            $model->score = '';
            if( $model->save() ){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'places' => $places,
            ]);
        }
    }

    /**
     * Updates an existing Matches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'adminUpdate';
        $model->onlyDate = date('d.m.Y', $model->date);
        $model->onlyTime = date('H:i', $model->date);
        $places = Places::find()->all();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->date = $this->convertDateAndTimeToInt($model->onlyDate, $model->onlyTime);
            if( $model->save() ){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'places' => $places,
            ]);
        }
    }

    /**
     * Deletes an existing Matches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Matches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Matches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Matches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function convertDateAndTimeToInt($date, $time)
    {
        $arr1 = explode(':', $time);
        $arr2 = explode('.', $date);
        // h, m, s, mo, d, y
        return mktime($arr1[0], $arr1[1], 0, $arr2[1], $arr2[0], $arr2[2]);
    }
}

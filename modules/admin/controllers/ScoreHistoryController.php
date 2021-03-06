<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ScoreHistory;
use app\models\ScoreHistorySearch;
use app\models\Matches;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessFilter;
use app\models\Users;

/**
 * ScoreHistoryController implements the CRUD actions for ScoreHistory model.
 */
class ScoreHistoryController extends Controller
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
     * Lists all ScoreHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $matches = Matches::find()->orderBy(['date' => SORT_DESC])->all();

        return $this->render('index', [
            'matches' => $matches,
        ]);
    }

    /**
     * Displays a single ScoreHistory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($matchId)
    {
        $model = ScoreHistory::find()->where(['matchId' => $matchId])->all();
        $match = Matches::find()->where(['id' => $matchId])->one();
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $model,
            'match' => $match,
        ]);
    }

    /**
     * Creates a new ScoreHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($matchId)
    {
        $model = new ScoreHistory();
        $model->matchId = $matchId;
        $match = Matches::findOne($model->matchId);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
            return $this->render('create', [
                'model' => $model,
                'match' => $match,
                'users' => Users::getAllUsers(),
            ]);
        // }
    }

    /**
     * Updates an existing ScoreHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $match = Matches::findOne($model->matchId);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
            return $this->render('update', [
                'model' => $model,
                'match' => $match,
            ]);
        // }
    }

    /**
     * Deletes an existing ScoreHistory model.
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
     * Finds the ScoreHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ScoreHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ScoreHistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

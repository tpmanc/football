<?php

namespace app\controllers;

use Yii;
use app\models\Matches;
use app\models\Places;
use app\models\ScoreHistory;
use app\models\Users;
use app\models\MatchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MatchController implements the CRUD actions for Matches model.
 */
class MatchController extends Controller
{
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
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
    public function actionMatchHistory()
    {
        $matches = Matches::find()->orderBy(['date' => SORT_DESC])->asArray()->all();

        return $this->render('match-history', [
            'matches' => $matches,
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
        $scores = ScoreHistory::find()->where(['matchId' => $model->id])->asArray()->all();
        $users = Users::getAllUsers();
        $place = $model->place;
        return $this->render('view', [
            'model' => $model,
            'scores' => $scores,
            'place' => $place,
            'users' => $users,
        ]);
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
}

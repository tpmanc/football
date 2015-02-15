<?php

namespace app\controllers;

use app\models\Users;

class StatisticsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$users = Users::findBySql('SELECT
									users.*,
									(SELECT count(id) FROM scoreHistory WHERE scoreHistory.playerId = users.id) as gameCount,
									(SELECT SUM(score) FROM scoreHistory WHERE scoreHistory.playerId = users.id) as goalCount
								FROM
									users')->asArray()->all();
        return $this->render('index', [
        	'users' => $users,
        ]);
    }

}

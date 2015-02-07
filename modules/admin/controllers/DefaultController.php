<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\components\AccessFilter;
use app\models\Matches;

class DefaultController extends Controller
{
	public function behaviors()
	{
	    return [
	        'access' => [
	            'class' => AccessFilter::className(),
	        ],
	    ];
	}

    public function actionIndex()
    {
    	$prevMatch = Matches::find()->where('score <> "" and date < :nowDate',[':nowDate' => time()])->orderBy('date', SORT_DESC)->limit(1)->one();
    	$nextMatch = Matches::find()->where('score = ""')->orderBy('date', SORT_ASC)->limit(1)->one();
        return $this->render('index', [
        	'prevMatch' => $prevMatch,
        	'nextMatch' => $nextMatch,
        ]);
    }
}

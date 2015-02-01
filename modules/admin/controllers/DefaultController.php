<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\components\AccessFilter;

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
        return $this->render('index');
    }
}

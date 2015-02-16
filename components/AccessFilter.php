<?php 
namespace app\components;

use Yii;
use yii\filters\AccessControl;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

class AccessFilter extends AccessControl
{
	public function init()
	{
		parent::init();
	}
	
	public function beforeAction($action)
	{
		if( !\Yii::$app->user->isGuest && \Yii::$app->user->identity->isAdmin ){
			return true;
		}
		// throw new ForbiddenHttpException('You are not allowed to perform this action.');
		return Yii::$app->getResponse()->redirect(['/site/login']);
		return false;
	}
}
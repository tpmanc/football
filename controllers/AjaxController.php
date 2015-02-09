<?php

namespace app\controllers;

use app\models\Places;
use app\models\Matches;
use yii\web\Response;

class AjaxController extends \yii\web\Controller
{
	public function actionPlaceInfo($id)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			\Yii::$app->response->format = Response::FORMAT_JSON;
			echo json_encode( Places::find()->where(['id' => $id])->asArray()->one() );
		}
	}

	public function actionSavePlace($id, $title, $adress)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			$model = Places::find()->where(['id' => $id])->one();
			if( !$model ){
				return $this->returnError();
			}
			$model->title = $title;
			$model->adress = $adress;
			if( $model->validate() ){
				if( $model->save() ){
					return $this->returnSuccess();
				}
				return $this->returnError();
			}
			\Yii::$app->response->format = 'json';
			return \yii\widgets\ActiveForm::validate($model);
		}
	}

	public function actionCreatePlace($title, $adress)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			$model = new Places();
			$model->title = $title;
			$model->adress = $adress;
			if( $model->validate() ){
				if( $model->save() ){
					return $this->returnSuccess();
				}
				return $this->returnError();
			}
			\Yii::$app->response->format = 'json';
			return \yii\widgets\ActiveForm::validate($model);
		}
	}

	public function actionMatchInfo($id)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			// \Yii::$app->response->format = Response::FORMAT_JSON;
			$match = Matches::find()->where(['id' => $id])->one();
			echo json_encode( ['id' => $match->id, 'onlyDate' => $match->date, 'onlyTime' => date('H:i', $match->date), 'score' => $match->score, 'placeId' => $match->placeId] );
		}
	}

	public function actionSaveMatch($id, $onlyDate, $onlyTime, $placeId, $score)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			$model = Matches::find()->where(['id' => $id])->one();
			$model->scenario = 'adminUpdate';
			if( !$model ){
				return $this->returnError();
			}
			$arr1 = explode('.', $onlyDate);
			$arr2 = explode(':', $onlyTime);
			$model->onlyDate = $onlyDate;
			$model->onlyTime = $onlyTime;
			$model->date = mktime($arr2[0], $arr2[1], 0, $arr1[1], $arr1[0], $arr1[2]);
			$model->placeId = $placeId;
			$model->score = $score;
			if( $model->validate() ){
				if( $model->save() ){
					return $this->returnSuccess();
				}
				return $this->returnError();
			}
			\Yii::$app->response->format = 'json';
			return \yii\widgets\ActiveForm::validate($model);
		}
	}

	public function actionCreateMatch($onlyDate, $onlyTime, $placeId)
	{
		if( \Yii::$app->user->identity->isAdmin ){
			$model = new Matches();
			$model->scenario = 'adminCreate';
			if( !$model ){
				return $this->returnError();
			}
			$arr1 = explode('.', $onlyDate);
			$arr2 = explode(':', $onlyTime);
			$model->onlyDate = $onlyDate;
			$model->onlyTime = $onlyTime;
			$model->date = mktime($arr2[0], $arr2[1], 0, $arr1[1], $arr1[0], $arr1[2]);
			$model->placeId = $placeId;
			if( $model->validate() ){
				if( $model->save() ){
					return $this->returnSuccess();
				}
				return $this->returnError();
			}
			\Yii::$app->response->format = 'json';
			return \yii\widgets\ActiveForm::validate($model);
		}
	}

	private function returnError()
	{
		return json_encode(['success' => false]);
	}

	private function returnSuccess()
	{
		return json_encode(['success' => true]);
	}

}

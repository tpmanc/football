<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JqueryAsset;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */
/* @var $form yii\widgets\ActiveForm */
?>
<script>var itemId = <?= (!$model->id)?'"new"':$model->id;?>;</script>
<div class="matches-form" ng-controller="matchController">

    <?php $form = ActiveForm::begin([
    	// 'enableAjaxValidation' => true
    ]); ?>

    <lx-date-picker model="datepicker.date" label="Дата матча" locale="ru"></lx-date-picker>

    <div flex-item>
        <lx-text-field label="Время начала" error="error.time">
            <input type="text" ng-model="textFields.onlyTime">
        </lx-text-field>
    </div>

    <br />
    <?php foreach($places as $key => $place){ ?>
        <div class="radio-button">
            <input type="radio" id="radio<?= $place->id?>" name="radio1" ng-model="textFields.placeId" value="<?= $place->id?>" class="radio-button__input">
            <label for="radio<?= $place->id?>" class="radio-button__label"><?= $place->title?></label>
            <span class="radio-button__help"><?= $place->adress?></span>
        </div>
    <?php } ?>

    
<?php /*
    <?= $form->field($model, 'onlyDate')->textInput() ?>

    <?= $form->field($model, 'onlyTime')->textInput() ?>

    <?= $form->field($model, 'placeId')->radioList(ArrayHelper::map($places, 'id', 'title')) ?>
*/?>

    <?php if(!$model->isNewRecord){ ?>
        <div flex-item>
            <lx-text-field label="Счет" error="error.score">
                <input type="text" ng-model="textFields.score">
            </lx-text-field>
        </div>
    <?php } ?>

    <br />
    <div class="form-group">
        <a class="btn btn--m btn--green btn--raised" ng-click="saveData()" lx-ripple>Сохранить</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

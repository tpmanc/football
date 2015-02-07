<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Places */
/* @var $form yii\widgets\ActiveForm */
?>
<script>var itemId = <?= (!$model->id)?'"new"':$model->id;?>;</script>
<div class="places-form" ng-controller="stadiumController">

    <?php $form = ActiveForm::begin(); ?>

    <div flex-item>
        <lx-text-field label="Название" error="error.title">
            <input type="text" ng-model="textFields.title">
        </lx-text-field>
    </div>

    <div flex-item>
        <lx-text-field label="Адрес" error="error.adress">
            <input type="text" ng-model="textFields.adress">
        </lx-text-field>
    </div>
    <br />
    <div class="form-group">
    	<a class="btn btn--m btn--green btn--raised" ng-click="saveData()">Сохранить</a>
    </div>
    <?php ActiveForm::end(); ?>

</div>

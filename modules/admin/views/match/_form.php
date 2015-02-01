<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JqueryAsset;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile(Yii::getAlias("@web/css/admin/bootstrap-clockpicker.min.css"), []);
$this->registerCssFile(Yii::getAlias("@web/css/admin/datepicker3.css"), []);

$this->registerJsFile(Yii::getAlias('@web/js/admin/clockpicker.js'), ['depends' => JqueryAsset::className()]);
$this->registerJsFile(Yii::getAlias('@web/js/admin/adminMatch.js'), ['depends' => JqueryAsset::className()]);
$this->registerJsFile(Yii::getAlias('@web/js/admin/bootstrap-datepicker.js'), ['depends' => JqueryAsset::className()]);
?>

<div class="matches-form">

    <?php $form = ActiveForm::begin([
    	'enableAjaxValidation' => true
    ]); ?>

    <?= $form->field($model, 'onlyDate')->textInput() ?>

    <?= $form->field($model, 'onlyTime')->textInput() ?>

    <?//= $form->field($model, 'placeId')->textInput() ?>

    <?= $form->field($model, 'placeId')->radioList(ArrayHelper::map($places, 'id', 'title')) ?>

    <?if(!$model->isNewRecord){echo $form->field($model, 'score')->textInput(['maxlength' => 6]);} ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="score-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'playerId')->textInput() ?>

    <?= $form->field($model, 'team')->textInput() ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

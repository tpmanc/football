<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-login reg">
    <div class="top-border">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
        <div class="four"></div>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'registration',
        'options' => ['class' => 'form-horizontal'],
        'enableAjaxValidation' => true,
        'fieldConfig' => [
            // 'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'template' => "<div class=\"col-lg-3 login-input\">{input}</div><div class=\"errorHolder\">{error}</div>",
            // 'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username', [
        'inputOptions' => ['placeholder'=>'Логин', 'autofocus' => true]
    ]) ?>

    <?= $form->field($model, 'name', [
        'inputOptions' => ['placeholder'=>'Имя']
    ]) ?>

    <?= $form->field($model, 'surname', [
        'inputOptions' => ['placeholder'=>'Фамилия']
    ]) ?>

    <?= $form->field($model, 'password', [
        'inputOptions' => ['placeholder'=>'Пароль']
    ])->passwordInput() ?>

    <?= $form->field($model, 'password2', [
        'inputOptions' => ['placeholder'=>'Повторите пароль']
    ])->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Регистрация', ['class' => 'login-btn', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php /* ?>
<div class="users-form">

    <?php $form = ActiveForm::begin([
		'id' => 'registration',
		'enableAjaxValidation' => true
	]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password2')->passwordInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
*/ ?>
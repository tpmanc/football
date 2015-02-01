<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JqueryAsset;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Войти';

// $this->registerCssFile(Yii::getAlias("@web/css/admin/datepicker3.css"), []);

$this->registerJsFile(Yii::getAlias('@web/js/animate.js'), ['depends' => JqueryAsset::className()]);
?>
<div class="site-login">
	<div class="top-border">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
		<div class="four"></div>
	</div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            // 'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'template' => "<div class=\"col-lg-3 login-input\">{input}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username', [
		'inputOptions' => ['placeholder'=>'Имя пользователя', 'autofocus' => true]
	]) ?>

    <?= $form->field($model, 'password', [
		'inputOptions' => ['placeholder'=>'Пароль']
	])->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Войти', ['class' => 'login-btn', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

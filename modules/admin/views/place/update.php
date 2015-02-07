<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Places */

$this->title = 'Update Places: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Стадионы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Стадион '.$model->title;
?>
<div class="places-update">

    <h1>Стадион <?= $model->title?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

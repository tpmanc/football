<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */

$this->title = 'Update Score History: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Score Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="score-history-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

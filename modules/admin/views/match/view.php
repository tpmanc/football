<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?/*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date' => [
                'label' => 'Дата',
                'value' => date('d.m.Y', (int)$model->date),
            ],
            'time' => [
                'label' => 'Время',
                'value' => date('H:i', (int)$model->date),
            ],
            'placeId' => [
                'label' => 'Место',
                'value' => $place->title,
            ],
            'score',
        ],
    ]) ?>

</div>

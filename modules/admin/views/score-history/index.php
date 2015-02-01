<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScoreHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Score Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-history-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Score History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'playerId',
            'team',
            'score',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Matches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'placeId',
            'score',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],

            
        ],
    ]); ?>

</div>

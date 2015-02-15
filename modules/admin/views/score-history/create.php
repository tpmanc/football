<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Забитые мячи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Матч за '.date('d.m.Y', $match->date), 'url' => ['view', 'matchId' => $match->id]];
$this->params['breadcrumbs'][] = 'Добавить';

?>
<div class="score-history-create">

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>

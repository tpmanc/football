<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */

$this->title = 'Редактировать';
$this->params['breadcrumbs'][] = ['label' => 'Забитые мячи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Матч за '.date('d.m.Y', $match->date), 'url' => ['view', 'matchId' => $match->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="score-history-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="rightFixed">
<?= Html::a('<i class="mdi mdi-delete"></i>', ['/admin/score-history/delete', 'id' => $model->id], ['class' => 'btn btn--xl btn--red btn--fab', 'data-method' => 'post', 'data-confirm' => 'Удалить?'])?>
</div>
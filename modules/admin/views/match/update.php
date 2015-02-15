<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = 'Матч ' . date('d.m.Y', $model->date);
$this->params['breadcrumbs'][] = ['label' => 'Матчи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Матч '.date('d.m.Y', $model->date);
?>
<div class="matches-update">

    <?= $this->render('_form', [
        'model' => $model,
        'places' => $places,
    ]) ?>

</div>
<br />
<?= Html::a('Добавить забитых мячей', ['/admin/score-history/create', 'matchId' => $model->id], ['class' => 'btn btn--m btn--blue btn--raised']) ?>
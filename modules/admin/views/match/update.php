<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = 'Update Matches: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matches-update">

	<?= Html::a('Добавить забитых мячей', ['/admin/score-history/create', 'matchId' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'places' => $places,
    ]) ?>

</div>

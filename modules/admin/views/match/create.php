<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = 'Добавить матч';
$this->params['breadcrumbs'][] = ['label' => 'Матчи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-create">

    <?= $this->render('_form', [
        'model' => $model,
        'places' => $places,
    ]) ?>

</div>

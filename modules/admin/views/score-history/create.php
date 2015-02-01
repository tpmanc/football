<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */

$this->title = 'Create Score History';

?>
<div class="score-history-create">

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'История игр';
?>
<div class="matches-index">

    <div class="matchesHolder">
        <?php foreach( $matches as $match ){?>
            <?= Html::a(date('d.m.Y', $match['date']), ['match/view', 'id' => $match['id']]) ?>
        <?php } ?>
    </div>

</div>

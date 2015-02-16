<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = 'Результат матча '.date('d.m.Y', $model->date);
$scoreArr = explode(':', $model->score);
?>
<div class="matches-view">
    <div class="teamHolder">
        <div class="redTeam">
            <div class="textArea">
                <div class="teamTitle">Красные</div>
                <div class="redSeparator"></div>
                <div class="scoreList">
                    <?php foreach($scores as $score){ if( $score['team'] == 1 ){ ?>
                        <div class="scoreItem"><?=$users[$score['playerId']]?> (<?= $score['score']?>)</div>
                    <?php } } ?>
                </div>
            </div>
            <div class="emblemArea">
                <img src="<?=Yii::getAlias('@web/images/redTeamEmblem.png')?>" alt="Красные" />
                <div class="redScore"><?if($model->score!=''){echo $scoreArr[0];}?></div>
            </div>
        </div>

        <div class="greenTeam">
            <div class="emblemArea">
                <div class="greenScore"><?if($model->score!=''){echo $scoreArr[1];}?></div>
                <img src="<?=Yii::getAlias('@web/images/greenTeamEmblem.png')?>" alt="Зеленые" />
            </div>
            <div class="textArea">
                <div class="teamTitle">Зеленые</div>
                <div class="greenSeparator"></div>
                <div class="scoreList">
                    <?php foreach($scores as $score){ if( $score['team'] == 2 ){ ?>
                        <div class="scoreItem"><?=$users[$score['playerId']]?> (<?= $score['score']?>)</div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div>

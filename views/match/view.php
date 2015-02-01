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
                    <div class="scoreItem">Леха Фамилия (4)</div>
                    <div class="scoreItem">Кирилл Казакевич (4)</div>
                    <div class="scoreItem">Леха Фамилия (4)</div>
                    <div class="scoreItem">Леха Фамилия (4)</div>
                </div>
            </div>
            <div class="emblemArea">
                <img src="<?=Yii::getAlias('@web/images/redTeamEmblem.png')?>" alt="Красные" />
                <div class="redScore"><?=$scoreArr[0]?></div>
            </div>
        </div>

        <div class="greenTeam">
            <div class="emblemArea">
                <div class="greenScore"><?=$scoreArr[0]?></div>
                <img src="<?=Yii::getAlias('@web/images/greenTeamEmblem.png')?>" alt="Зеленые" />
            </div>
            <div class="textArea">
                <div class="teamTitle">Зеленые</div>
                <div class="greenSeparator"></div>
                <div class="scoreList">
                    <div class="scoreItem">Леха Фамилия (4)</div>
                    <div class="scoreItem">Кирилл Казакевич (4)</div>
                    <div class="scoreItem">Леха Фамилия (4)</div>
                    <div class="scoreItem">Леха Фамилия (4)</div>
                </div>
            </div>
        </div>
    </div>
</div>

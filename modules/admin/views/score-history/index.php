<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScoreHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забитые мячи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-history-index">
    <h1 class="pageH1"><?= Html::encode($this->title) ?></h1>
    
    <h3 class="pageH1">Выберите матч</h3>

    <div class="data-table-container">
        <table class="data-table data-table--has-secondary">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Счет</th>
                    <th>Место</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($matches as $match){ ?>
                    <tr class="data-table__clickable-row" onclick="location.href='<?= Url::to(['/admin/score-history/view', 'matchId' => $match['id']])?>'">
                        <td>
                            <span><?= date('d.m.Y', $match->date)?></span>
                        </td>
                        <td>
                            <span><?= date('H:i', $match->date)?></span>
                        </td>
                        <td>
                            <span><?= $match->score?></span>
                        </td>
                        <td>
                            <span><?= $match->place->title?></span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Матчи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-index">
    <h1 class="pageH1"><?= Html::encode($this->title) ?></h1>
    
    <div class="data-table-container">
        <table class="data-table data-table--has-secondary">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Счет</th>
                    <th>Место</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($matches as $match){ ?>
                    <tr class="data-table__clickable-row">
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
                        <td>
                            <lx-dropdown position="right" from-top>
                                <button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>

                                <lx-dropdown-menu>
                                    <ul>
                                        <li><?= Html::a('Редактировать', ['/admin/match/update', 'id' => $match['id']], ['class' => 'dropdown-link'])?></li>
                                        <li><?= Html::a('Просмотр', ['/admin/match/view', 'id' => $match['id']], ['class' => 'dropdown-link'])?></li>
                                        <li><?= Html::a('Посмотреть на сайте', ['/match/view', 'id' => $match['id']], ['class' => 'dropdown-link'])?></li>
                                    </ul>
                                </lx-dropdown-menu>
                            </lx-dropdown>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<div class="rightFixed"><?= Html::a('<i class="mdi mdi-plus"></i>', ['/admin/match/create'], ['class' => 'btn btn--xl btn--blue btn--fab'])?></div>
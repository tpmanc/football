<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */

$this->title = 'Матч за '.date('d.m.Y', $match->date);
$this->params['breadcrumbs'][] = ['label' => 'Забитые мячи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-history-view">

    <table class="data-table data-table--has-secondary">
            <thead>
                <tr>
                    <th>Игрок</th>
                    <th>Команда</th>
                    <th>Забил голов</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($model as $score){ ?>
                    <tr class="data-table__clickable-row">
                        <td>
                            <span><?= $score->player->surname .' '. $score->player->name?></span>
                        </td>
                        <td>
                            <span><?= ($score->team==1)?'Зеленая':'Красная';?> команда</span>
                        </td>
                        <td>
                            <span><?= $score->score?></span>
                        </td>
                        <td>
                            <lx-dropdown position="right" from-top>
                                <button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>

                                <lx-dropdown-menu>
                                    <ul>
                                        <li><?= Html::a('Редактировать', ['/admin/score-history/update', 'id' => $score->id], ['class' => 'dropdown-link'])?></li>
                                    </ul>
                                </lx-dropdown-menu>
                            </lx-dropdown>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

</div>

<div class="rightFixed"><?= Html::a('<i class="mdi mdi-plus"></i>', ['/admin/score-history/create', 'matchId' => $match->id], ['class' => 'btn btn--xl btn--blue btn--fab'])?></div>
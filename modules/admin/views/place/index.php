<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стадионы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-index">

    <h1 class="pageH1"><?= Html::encode($this->title) ?></h1>
    
    <div class="data-table-container">
        <table class="data-table data-table--has-secondary">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Адрес</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($places as $place){ ?>
                    <tr class="data-table__clickable-row">
                        <td>
                            <span><?= $place->title?></span>
                        </td>
                        <td>
                            <span><?= $place->adress?></span>
                        </td>
                        <td>
                            <lx-dropdown position="right" from-top>
                                <button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>

                                <lx-dropdown-menu>
                                    <ul>
                                        <li><?= Html::a('Редактировать', ['/admin/place/update', 'id' => $place['id']], ['class' => 'dropdown-link'])?></li>
                                        <li><?= Html::a('Просмотр', ['/admin/place/view', 'id' => $place['id']], ['class' => 'dropdown-link'])?></li>
                                        <?php /*<li><?= Html::a('Удалить', ['/admin/place/delete', 'id' => $place['id']], ['class' => 'dropdown-link', 'data-method' => 'post', 'data-confirm'=>'Удалить?'])?></li>*/?>
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

<div class="rightFixed"><?= Html::a('<i class="mdi mdi-plus"></i>', ['/admin/place/create'], ['class' => 'btn btn--xl btn--blue btn--fab'])?></div>
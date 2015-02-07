<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <h1 class="pageH1"><?= Html::encode($this->title) ?></h1>
    
    <div class="data-table-container">
        <table class="data-table data-table--has-secondary">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Права администратора</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $user){ ?>
                    <tr class="data-table__clickable-row">
                        <td>
                            <span><?= $user->name?></span>
                        </td>
                        <td>
                            <span><?= $user->surname?></span>
                        </td>
                        <td>
                            <span><?= $user->isAdmin?></span>
                        </td>
                        <td>
                            <lx-dropdown position="right" from-top>
                                <button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>

                                <lx-dropdown-menu>
                                    <ul>
                                        <li><?= Html::a('Редактировать', ['/admin/match/update', 'id' => $user['id']], ['class' => 'dropdown-link'])?></li>
                                        <li><?= Html::a('Просмотр', ['/admin/match/view', 'id' => $user['id']], ['class' => 'dropdown-link'])?></li>
                                        <li><?= Html::a('Посмотреть на сайте', ['/match/view', 'id' => $user['id']], ['class' => 'dropdown-link'])?></li>
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

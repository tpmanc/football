<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Places */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Стадионы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-view">
    <div flex-item>
        <ul class="list">
            <li class="list-row list-row--has-primary list-row--has-separator">
                <div class="list-content-tile list-content-tile--two-lines">
                    <strong><?= $model->id?></strong>
                    <span>ID</span>
                </div>
            </li>
            <li class="list-row list-row--has-primary list-row--has-separator">
                <div class="list-content-tile list-content-tile--two-lines">
                    <strong><?= $model->title?></strong>
                    <span>Название</span>
                </div>
            </li>
            <li class="list-row list-row--has-primary list-row--has-separator">
                <div class="list-content-tile list-content-tile--two-lines">
                    <strong><?= $model->adress?></strong>
                    <span>Адрес</span>
                </div>
            </li>
        </ul>
    </div>

</div>

<div class="rightFixed">
<?= Html::a('<i class="mdi mdi-pencil"></i>', ['/admin/place/update', 'id' => $model->id], ['class' => 'btn btn--xl btn--blue btn--fab'])?>&nbsp;&nbsp;
<?= Html::a('<i class="mdi mdi-delete"></i>', ['/admin/place/delete', 'id' => $model->id], ['class' => 'btn btn--xl btn--red btn--fab', 'data-method' => 'post', 'data-confirm' => 'Удалить?'])?>
</div>
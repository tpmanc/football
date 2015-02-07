<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matches */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Матчи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Матч '.date('d.m.Y', $model->date);
?>
<div class="matches-view">
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
					<strong><?= date('d.m.Y', (int)$model->date)?></strong>
					<span>Дата матча</span>
				</div>
			</li>
			<li class="list-row list-row--has-primary list-row--has-separator">
				<div class="list-content-tile list-content-tile--two-lines">
					<strong><?= date('H:i', (int)$model->date)?></strong>
					<span>Время начала</span>
				</div>
			</li>
			<li class="list-row list-row--has-primary list-row--has-separator">
				<div class="list-content-tile list-content-tile--two-lines">
					<strong><?= $model->place->title?></strong>
					<span>Место</span>
				</div>
			</li>
			<li class="list-row list-row--has-primary list-row--has-separator">
				<div class="list-content-tile list-content-tile--two-lines">
					<strong><?= ($model->score=='')?'неизвестно':$model->score?></strong>
					<span>Счет</span>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="rightFixed"><?= Html::a('<i class="mdi mdi-pencil"></i>', ['/admin/match/update', 'id' => $model->id], ['class' => 'btn btn--xl btn--blue btn--fab'])?></div>
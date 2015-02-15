<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreHistory */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
var itemId = <?= (!$model->id)?'"new"':$model->id;?>;
var matchId = <?= $model->matchId?>;
</script>
<div class="score-history-form" ng-controller="scoreHistoryController">

	<div flex-item>
        <lx-select ng-model="selects.selectedPerson" placeholder="Игрок" choices="people" floating-label>
            <lx-select-selected>
                {{ $selected.name }}
            </lx-select-selected>

            <lx-select-choices>
                {{ $choice.name }}
            </lx-select-choices>
        </lx-select>
    </div>

	<br />

    <div class="radio-button" ng-repeat="team in textFields.teams">
        <input type="radio" id="radio{{team.value}}" name="radio1" ng-model="textFields.team" value="{{team.value}}" class="radio-button__input">
        <label for="radio{{team.value}}" class="radio-button__label">{{team.title}}</label>
    </div>

    <div flex-item>
        <lx-text-field label="Забил голов">
            <input type="text" ng-model="textFields.score">
        </lx-text-field>
    </div>

    <br />

    <div class="form-group">
        <a class="btn btn--m btn--green btn--raised" ng-click="saveData()" lx-ripple>Сохранить</a>
    </div>

</div>

<?php
use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="contentHolder">
                <div class="topMenu">
                    <div class="leftButtons">
                        <?= Html::a('Все матчи', ['/match/match-history'], ['class' => (Yii::$app->requestedRoute == 'match/match-history' || Yii::$app->requestedRoute == '')?'active':'' ]) ?>
                        <?= Html::a('Статистика', ['/site/index'], ['class' => (Yii::$app->requestedRoute == 'site/index')?'active':'' ]) ?>
                        <?= Html::a('Награды', ['/site/index'], ['class' => (Yii::$app->requestedRoute == 'site/index')?'active':'' ]) ?>
                    </div>
                    <div class="rightButtons">
                        <?= Html::a('Выйти ( '.\Yii::$app->user->identity->username.' )', ['site/logout'], ['data-method' => 'post']) ?>
                    </div>
                </div>

            <div class="container">
                <h1 class="pageH1"><?= Html::encode($this->title) ?></h1>
                <div class="separatorHolder"><div class="separator"></div></div>

                <?= $content ?>
            </div>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
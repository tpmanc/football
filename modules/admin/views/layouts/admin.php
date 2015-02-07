<?php
use yii\helpers\Html;
use app\assets\AdminAsset;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
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
<body ng-app="myApp">

<?php $this->beginBody() ?>
	<div class="wrap">
		<div class="card bgc-red-500">
			<div class="toolbar">
				<div class="toolbar__left mr++">
					<button class="btn btn--l btn--black btn--icon" lx-ripple>
						<i class="mdi mdi-menu"></i>
					</button>
				</div>
				<span class="toolbar__label fs-title ml">Панель администратора</span>
				<div class="toolbar__right">
					<div class="toolbar__left">
						<lx-search-filter model="searchFilter.sixth" filter-width="100%" closed filter-width="200px" position="left" placeholder="Поиск"></lx-search-filter>
					</div>
					<div class="toolbar__left"  id="topDropDown" style="display:none;">
						<lx-dropdown position="right" from-top>
							<button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
								<i class="mdi mdi-dots-vertical"></i>
							</button>

							<lx-dropdown-menu>
								<ul>
									<li></li>
									<li><a class="dropdown-link">Another action</a></li>
									<li><a class="dropdown-link">Something else here</a></li>
									<li class="dropdown-divider"></li>
									<li><a class="dropdown-link dropdown-link--is-header">Header</a></li>
									<li><?= Html::a('Вернуться на сайт', ['/'], ['class' => 'dropdown-link']) ?></li>
								</ul>
							</lx-dropdown-menu>
						</lx-dropdown>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="left-menu bgc-red-400">
				<div><?= Html::a('<i class="icon icon--l mdi mdi-calendar"></i>Матчи', ['/admin/match/index']) ?></div>
				<?php /*<div><?= Html::a('<i class="icon icon--l mdi mdi-account-multiple"></i>Игроки', ['/admin/user/index']) ?></div>*/?>
				<div><?= Html::a('<i class="icon icon--l mdi mdi-store"></i>Стадионы', ['/admin/place/index']) ?></div>
			</div>
			<div class="contentHolder">
				<?= Breadcrumbs::widget([
					'homeLink' => [
			            'label' => 'Главная',
			            'url' => Yii::$app->homeUrl,
			            'encode' => false// Requested feature
			        ],
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					
				]) ?>
				<?= $content ?>
			</div>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

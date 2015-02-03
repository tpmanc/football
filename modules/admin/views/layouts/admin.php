<?php
use yii\helpers\Html;
use app\assets\AdminAsset;

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
		<div class="contentHolder">
			<div class="card bgc-blue-300">
				<div class="toolbar">
					<div class="toolbar__left mr++">
						<button class="btn btn--l btn--black btn--icon" lx-ripple>
							<i class="mdi mdi--menu"></i>
						</button>
					</div>
					<span class="toolbar__label fs-title ml">Панель администратора</span>
					<button class="btn btn--m btn--black btn--icon" lx-ripple><i class="mdi mdi--people"></i></button>
					<div class="toolbar__right">
						<div class="toolbar__left">
							<lx-search-filter model="searchFilter.sixth" filter-width="100%" closed filter-width="200px" position="left" placeholder="Поиск"></lx-search-filter>
						</div>
						<div class="toolbar__left">
							<lx-dropdown position="right" from-top>
								<button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
									<i class="mdi mdi--more-vert"></i>
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
			<?/*
			<div class="navbar-fixed">
				<nav class="deep-orange lighten-1">
					<div class="nav-wrapper">
						<div class="col s12">
							<?= Html::a('Панель администратора', ['/admin'], ['class' => 'brand-logo']) ?>
							<ul class="right side-nav">
								<li><?= Html::a('Матчи<i class="mdi-navigation-arrow-drop-down right"></i>', ['#'], ['class' => 'dropdown-button', 'data-activates' => 'matchesDrop']) ?></li>
								<li><?= Html::a('Игроки<i class="mdi-navigation-arrow-drop-down right"></i>', ['#'], ['class' => 'dropdown-button', 'data-activates' => 'usersDrop']) ?></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>*/?>

			<div class="container">
				<?= $content ?>
			</div>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

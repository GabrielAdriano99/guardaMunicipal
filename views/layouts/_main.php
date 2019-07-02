<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\SideNav;

AppAsset::register($this);

$titleNav = Yii::t('app', 'Browser here');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('img/jje-logo.png', ['alt' => 'LOGO', 'height' => 50, 'width' => 160]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => '<span class="glyphicon glyphicon-user"></span> Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '<span class="glyphicon glyphicon-user"></span> Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= SideNav::widget([
                    'type' => SideNav::TYPE_INFO,
                    'encodeLabels' => false,
                    // 'heading' => Html::encode($this->title),
                    'heading' => $titleNav,
                    'items' => [
                        ['label' => Yii::t('app', 'Dashboard'), 'icon' => 'home', 'url' => Url::to(['site/index'])],
                        ['label' => Yii::t('app', 'Register'), 'icon' => 'tasks', 'items' => [
                                ['label' => Yii::t('app', 'Scale'), 'url' => Url::to(['event/index'])],
                                ['label' => Yii::t('app', 'Stock'), 'url' => Url::to(['material/create'])],
                                ['label' => Yii::t('app', 'Employees'), 'url' => Url::to(['funcionario/create'])],
                        ]],
                        ['label' => Yii::t('app', 'Ending'), 'icon' => 'tag', 'items' => [
                            ['label' => Yii::t('app', 'View loan'), 'url' => Url::to(['funcionario-has-material/index'])],    
                            ['label' => Yii::t('app', 'Register loan'), 'url' => Url::to(['funcionario-has-material/create'])],
                        ]],
                        ['label' => Yii::t('app', 'Shopping'), 'icon' => 'barcode', 'items' => [
                                ['label' => Yii::t('app', 'Manager purchases'), 'url' => Url::to(['pedido-nota/index'])],
                        ]],
                        ['label' => Yii::t('app', 'Sales'), 'icon' => 'shopping-cart', 'items' => [
                                ['label' => Yii::t('app', 'Budget'), 'url' => null],
                                ['label' => Yii::t('app', 'Manage sales'), 'url' => Url::to(['pedido-nota/index'])],
                        ]],
                    ],
                ]);
                ?>
            </div>

            <div class="col-sm-9">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div> <!-- end container -->
</div> <!-- end wrap -->

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php

/**
 * @var $content string
 * @var $email string
 */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


    <?php
    NavBar::begin([
        'brandLabel' => 'Yii2test',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-default']
    ]);
    echo Nav::widget([
        'items' => [
            ['label' => 'About us', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ],
        'options' => ['class' => 'navbar-nav nav'],
    ]);

    if (Yii::$app->user->isGuest)
        echo Nav::widget([
            'items' => [
                ['label' => 'Hello, guest!', 'items' => [
                    ['label' => 'Sign in', 'url' => ['/site/login']],
                    ['label' => 'Sign up', 'url' => ['/site/register']]
                ]]
            ],
            'options' => ['class' => 'navbar-nav nav navbar-right']
        ]);
    else
        echo Nav::widget([
            'items' => [
                ['label' => 'Hello, ' . Yii::$app->user->identity->name, 'items' => [
                    ['label' => 'Profile', 'url' => ['/profile/' . Yii::$app->user->identity->id]],
                    ['label' => 'Wishlist', 'url' => ['/wishlist']],
                    ['label' => 'Cart', 'url' => ['/cart']],
                    ['label' => '', 'options' => ['class' => 'divider']],
                    ['label' => 'User menu', 'url' => '/admin/user'],
                    ['label' => 'Product menu', 'url' => '/admin/product'],
                    ['label' => 'Normal mode', 'url' => '/'],
                    ['label' => '', 'options' => ['class' => 'divider']],
                    ['label' => 'Log out', 'url' => ['/user/logout']],
                ]]
            ],
            'options' => ['class' => 'navbar-nav nav navbar-right']
        ]);

    NavBar::end();


    ?>

    <?= $content ?>
    <footer class="footer col-xs-0">
        <div class="container">
            <p class="pull-left">&copy; Yii2test <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
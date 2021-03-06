<?php

/* @var $this \yii\web\View */
/* @var $content string */

use news\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$news_menu_list = $this->params['news_menu_list'];
AppAsset::register($this);
//$this->registerJsFile("@web/js/jquery-2.0.3.min.js");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News">
    <meta name="author" content="">
    <title><!--news_title--></title>
    <link rel="stylesheet" href="static/css/ace.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<?php
NavBar::begin([
    'brandLabel' => '新闻导航',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'row navbar navbar-default navbar-fixed-top',
    ],
]);

foreach($news_menu_list as $menu_item) {
    $menuItems[] = [
        'label' => $menu_item['name'], 'url' => [$menu_item['url']],
    ];
}
/*$menuItems = [
    [
        'label' => '国内新闻', 'url' => ['/site/index'],
    ],
    [
        'label' => '财经', 'url' => ['/site/index'],
    ],
    [
        'label' => '科技', 'url' => ['/site/index'],
    ],
    [
        'label' => '房产', 'url' => ['/site/index'],
    ],
    [
        'label' => '旅游', 'url' => ['/site/index'],
    ],
    [
        'label' => '图片', 'url' => ['/site/index'],
    ],
];*/
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    $menuItems[] = ['label' => '註冊', 'url' => ['/site/signup']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            '用户登出 (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'row navbar-nav  text-center'],
    'items' => $menuItems,
]);
NavBar::end();
?>
<div class="container-fluid" style="margin-top: 30px">
    <div class="row">
        <div class="text-center"><h3><!--title--></h3></div>
        <div class="col-md-1 text-center"><!--left--></div>
        <div class="col-md-10 text-center">
            <?= $content ?>
        </div>
        <div class="col-md-1 text-center"><!--right--></div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
</body>
<script src="static/assets/js/jquery-2.0.3.min.js"></script>
<script src="static/assets/js/news_list.js"></script>
<script src="static/assets/js/bootstrap.min.js"></script>
</html>
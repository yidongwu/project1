<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$news_menu_list = $this->params['news_menu_list'];
$types = Yii::$app->view->params['types'];
AppAsset::register($this);
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

<div >
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    foreach($news_menu_list as $menu_item) {
        $menuItems[] = [
            'label' => $menu_item['name'], 'url' => [$menu_item['url']],
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</div>
<div class="container-fluid" style="margin-top: 30px">
    <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1" style="margin-top: 50px">
        <ul class="nav navbar-nav " style="margin: auto auto">
            <?php
            foreach($types as $type) {
                $type_link = Html::a($type['type_name'], ['goods-types/list', 'type' => $type['id']]);
                $type_list = <<<TYPE
<li class="">{$type_link}</li>
TYPE;
                echo $type_list;
            }
            ?>
        </ul>
    </div>


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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

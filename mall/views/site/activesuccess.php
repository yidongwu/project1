<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '账号激活成功！';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>前往<?=Html::a('登录', ['site/login'])  ?></p>

</div>

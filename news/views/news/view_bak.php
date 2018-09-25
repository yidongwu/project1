<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo $news_static_html;
?>

<div class="ad-attrs-form">
    <?php $form = ActiveForm::begin([
        'action' => ['review/create'],
    ]); ?>
    <div class="row">
        <?= $form->field($model, 'review')->textarea(['maxlength' => true])->label(false) ?>
        <?= $form->field($model, 'goods_news_id',['inputOptions'=>['value'=>Yii::$app->request->get('id'),'class'=>'form-control']])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'date',['inputOptions'=>['value'=>time(),'class'=>'form-control']])->hiddenInput()->label(false) ?>
        <?= Html::submitButton('发表评论', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>







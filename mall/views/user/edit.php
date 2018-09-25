<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2018/9/13
 * Time: 22:20
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;
?>

<div class="email-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nick_name')->textInput(['value' => !empty($user_info) ? $user_info['nick_name'] : 'Ufewfsiefw578']) ?>
    <?= $form->field($model, 'sex')->textInput(['value' => !empty($user_info) ? $user_info['sex'] : '1']) ?>
    <?= $form->field($model, 'birthday')->textInput(['value' => !empty($user_info) ? $user_info['birthday'] : time()]) ?>
    <?= $form->field($model, 'company_name')->textInput(['value' => !empty($user_info) ? $user_info['company_name'] : '-']) ?>
    <?= $form->field($model, 'address')->textInput(['value' => !empty($user_info) ? $user_info['address'] : '-']);
    ?>
    <?= $form->field($model, 'createTime')->hiddenInput(['value' => !empty($user_info) ? $user_info['createTime'] : time()])->label(false) ?>
    <?= $form->field($model, 'updateTime')->hiddenInput(['value'=>time()])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = '修改個人資料';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

   <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        // 'options' => ['class' => 'form-horizontal'],
        // 'fieldConfig' => [
        //     'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
        // ],
    ]); ?>

    <?= $form->field($model, 'account'); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <div class="pull-right">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('存擋', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            <?= Html::a('取消','index',['class' => 'btn btn-default']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
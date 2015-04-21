<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = '註冊帳號';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php if (Yii::$app->session->hasFlash('registerng')) {?>
    
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>會員已註冊，請勿重新註冊</strong>
    </div>
    
    <?php };?>

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
            <?= Html::submitButton('註冊', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            <?= Html::a('取消註冊','login',['class' => 'btn btn-default']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

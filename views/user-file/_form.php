<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\EzFilepath */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ez-filepath-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            // 'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                //'previewFileType' => 'image',
                'showUpload' => false
            ]
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '存檔', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

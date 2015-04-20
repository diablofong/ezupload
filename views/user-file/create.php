<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EzFilepath */

$this->title = '上傳檔案';
$this->params['breadcrumbs'][] = ['label' => '個人檔案管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ez-filepath-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '個人檔案管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ez-filepath-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('上傳檔案', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'filename',
            'uploaddate',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'app\components\FileActionColumn'],
        ],
    ]); ?>

</div>

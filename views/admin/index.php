<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EzUser;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理上傳檔案';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ez-filepath-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => '上傳者名稱',
                'value' => function ($data){
                    return $data->ezuser->username;
                }
            ],
            'filename',
            'uploaddate',
            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'app\components\FileActionColumn'],
        ],
    ]); ?>

</div>

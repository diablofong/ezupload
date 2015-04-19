<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ez Filepaths';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ez-filepath-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ez Filepath', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'filename',
            'uploaddate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

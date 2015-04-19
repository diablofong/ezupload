<?php

namespace app\Controllers;

use Yii;
use app\models\EzFilepath;
use app\models\UserFileSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * UserFileController implements the CRUD actions for EzFilepath model.
 */
class UserFileController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EzFilepath models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserFileSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new EzFilepath model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EzFilepath();

        if (Yii::$app->request->isPost) {
            
            $model->load(Yii::$app->request->post());
            
            $file = UploadedFile::getInstance($model, 'file'); 
            
            if (!empty($file->name)) {
               
               $path =  'upload/'.uniqid();

               FileHelper::createDirectory($path);//建立目錄
            
               $model->filename = $file->name;

               $model->filepath = $path;
               
               $filename = $path.'/'.$file->name;
               
               $file->saveAs($filename);//存入資料夾
            }

            $model->userid = Yii::$app->user->id;

            if ($model->validate()) {
                $model->save();
                return $this->redirect('index');
            }else{
                return $model;
            }

           
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing EzFilepath model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDownload($id)
    {
        $model = $this->findModel($id);

        return Yii::$app->response->sendFile($model->filepath.'/'.$model->filename);
    }

    /**
     * Deletes an existing EzFilepath model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        
        FileHelper::removeDirectory($model->filepath);//移除檔案
        
        $model->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the EzFilepath model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EzFilepath the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        //修改查詢方法,新增使用者id查詢條件
        //if (($model = EzFilepath::findOne($id)) !== null) {
        $model = EzFilepath::find($id)->where('id = :id and userid = :userid',
            [':id'=>$id , ':userid'=>Yii::$app->user->id])->one();
        if (isset($model)) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\Controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\AccessAdminRule;
use app\models\EzFilepath;
use app\models\AdminFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for EzFilepath model.
 * @author duncan <[duncan@mail.npust.edu.tw]>
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
                    'class' => AccessAdminRule::className(),
                ],
                'only' => ['index','download','delete'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        $searchModel = new AdminFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //var_dump($dataProvider);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        if (($model = EzFilepath::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

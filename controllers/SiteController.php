<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\EzUser;
use app\models\ContactForm;

/**
 * SiteController 
 * @author duncan <[duncan@mail.npust.edu.tw]>
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','personal'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // [
                    //     'actions' => ['personal'],
                    //     'allow' => true,
                    //     'roles' => ['?'],
                    // ],
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * 系統首頁
     * @return [type] [description]
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 登入系統
     *
     */
    public function actionLogin()
    {
        
        if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 使用者註冊
     * 
     */
    public function actionRegister()
    {
            $model = new EzUser();
            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
               
               if ($model->isRegister()) {
                   Yii::$app->session->setFlash('registerng');
                   return $this->refresh();
               }

               $model->password = hash_hmac('sha256', $model->password , '');
               
               $model->save();
               
               Yii::$app->session->setFlash('registerok');
               
               $model = new LoginForm();
               
               return $this->redirect('login', [
                    'model' => $model,
                ]);
            };
            
            return $this->render('register', [
                'model' => $model,
            ]);
    }

    /**
     * 登出系統
     * 
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * 使用者修改個人資料
     * @return [type] [description]
     */
    public function actionPersonal()
    {
        //$model = new RegisterForm();
        $model = EzUser::findOne(Yii::$app->user->id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password = hash_hmac('sha256', $model->password , '');
            $model->save();
        }
        return $this->render('personal', [
            'model' => $model,
        ]);
    }

}

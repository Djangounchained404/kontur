<?php

namespace frontend\controllers;

use frontend\component\Common;

use frontend\models\Feedback;
use frontend\models\UploadFormModel;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function beforeAction($action)
    {
      if ($action->id =='index') {
          $this->enableCsrfValidation = false;
      }

      return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */



    public function actionIndex()
    {

        //testAjax
//        if (Yii::$app->request->isAjax){
//           var_dump($_POST);
////        debug(Yii::$app->request->get());
//            return 'test';
//        }

        $model = new UploadFormModel();

        if ($model->load(Yii::$app->request->post())) {


            (Yii::$app->request->post()['UploadFormModel']['username']? $model->username = Yii::$app->request->post()['UploadFormModel']['username']: " ");
            (Yii::$app->request->post()['UploadFormModel']['email']? $model->email = Yii::$app->request->post()['UploadFormModel']['email']: " ");
            (Yii::$app->request->post()['UploadFormModel']['phone']? $model->phone = Yii::$app->request->post()['UploadFormModel']['phone']: " ");

            if ($model->save()){

            $model->update();
//                Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl()); перезагрузка страниц
                Common::goBackUnlogin($model);

            }
            else{
                Yii::$app->session->setFlash('upload_success', 'Ваши данные не сохранены!');
            }

        }

//        return $this->render('index', compact('model'));
           return $this->render('index');
    }






}





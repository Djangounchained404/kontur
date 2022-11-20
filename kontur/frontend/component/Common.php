<?php
/**
 * Created by PhpStorm.
 * User: zebra
 * Date: 17.11.2022
 * Time: 13:29
 */

namespace  frontend\component;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

use frontend\controllers\SiteController;





class Common extends Component
{


    public static function sendMail(
        $subject,
        $text,
        $emailFrom = 'design.solutions54@yandex.ru',
        $nameFrom = 'Администрация портала'
    )
    {
        try{
            if
            (
            Yii::$app->mailer->compose()
                ->setFrom(['design.solutions54@yandex.ru' => 'Администрация портала'])
                ->setTo([$emailFrom => $nameFrom])
                ->setSubject($subject)
                ->setHtmlBody($text)
                ->send()
            ) {
                echo Yii::$app->session->setFlash('success', 'Сообщение отправлено и данные записанны в БД!');
                return true;
            }
        } catch(\Swift_TransportException $e){
            echo Yii::$app->session->setFlash('error', 'Ошибка доставки почты - Swift_TransportException');
        }
        catch(yii\base\ErrorException $e){
            echo Yii::$app->session->setFlash('error', 'Ошибка доставки почты - ErrorException');
        }


    }



    public static function goBackUnlogin ($model) {
        $userEmail = 'design.solutions54@yandex.ru';
        $text_body= '<h3>'.'Здравствуйте!'.'</h3><h3>'.'Почта из формы: '.$model->email.'</h3><h3>'
            .'Имя из формы: '.$model->username.'</h3><h3>'.'Телефон из формы: '.$model->phone.'</h3>';
        Common::sendMail('Отправка письма по задаче компании Контур', $text_body, $userEmail, NULL);

    }




}
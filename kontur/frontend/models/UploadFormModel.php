<?php
/**
 * Created by PhpStorm.
 * User: zebra
 * Date: 16.11.2022
 * Time: 20:43
 */


namespace frontend\models;

use DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

use common\models\User;

class UploadFormModel extends ActiveRecord
{



    public static function tableName()
    {
        return '{{%kontur_users}}';
    }

    public function rules()
    {

        return [
            ['username', 'required','message' => 'Недопустимо пустое поле'],
            ['phone', 'required','message' => 'Недопустимо пустое поле'],
            ['email', 'required','message' => 'Недопустимо пустое поле'],
            [['username', 'email'], 'trim'],
            [['username','email'], 'string', 'max' => 100, 'tooLong' => 'Значение не более 100 символов', 'tooShort' => 'Значение не более 100 символов'],
            ['username', 'string', 'min' => 2 ,'tooLong' => 'Значение не менее 2 символов', 'tooShort' => 'Значение не менее 2 символов'],
            ['email', 'email','message' => 'Недопустимый email'],
        ];

    }

    public function attributeLabels()
    {
        return [
            'username'=>'Имя',
            'phone'=>'Телефон',
            'email'=>'Электронная почта',

        ];

    }


    public function beforeValidate()
    {
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function beforeSave($insert)
    {

            $this->phone = str_replace(['-', ' ', '(', ')', '+'], '', $this->phone);
            return parent::beforeSave($insert); // TODO: Change the autogenerated stub

    }

}
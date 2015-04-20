<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegisterForm is the model behind the register form.
 * @author duncan <[duncan@mail.npust.edu.tw]>
 */
class RegisterForm extends Model
{
    public $account;
    public $password;
    public $username;
    public $email;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['account'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '使用者序號',
            'account' => '使用者帳號',
            'password' => '使用者密碼',
            'username' => '使用者名稱',
            'email' => '使用者信箱',
        ];
    }

}

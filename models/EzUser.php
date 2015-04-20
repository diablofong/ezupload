<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ez_user".
 *
 * @author duncan <[duncan@mail.npust.edu.tw]>
 * @property integer $id
 * @property string $account
 * @property string $password
 * @property string $username
 * @property string $email
 */
class EzUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ez_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account','password','username','email'], 'required'],
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

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find()->where('id = :id',[':id'=>$id])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where('account = :account',[':account'=>$username])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === hash_hmac('sha256', $password , '');
    }

    /**
     * 判斷是否重複註冊方法
     * @return boolean 有註冊過會員直接回傳true反之false
     */
    public function isRegister()
    {
        $model = self::find()->where('account = :account',[':account'=>$this->account])->one();
        if (isset($model)) {
            return true;
        }
        return false;
    }


}

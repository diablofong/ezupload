<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ez_user".
 *
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
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        //return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ez_filepath".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $filename
 * @property string $uploaddate
 */
class EzFilepath extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ez_filepath';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid'], 'integer'],
            [['uploaddate','file'], 'safe'],
            [['filename','filepath'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '檔案序號',
            'userid' => '使用者序號',
            'filename' => '檔案名稱',
            'filepath' => '檔案路徑',
            'uploaddate' => '上傳時間',
            'file' => '檔案',
        ];
    }
}

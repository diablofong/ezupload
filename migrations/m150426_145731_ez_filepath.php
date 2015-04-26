<?php

use yii\db\Schema;
use yii\db\Migration;

class m150426_145731_ez_filepath extends Migration
{
    public function up()
    {
       $tableOptions = null;
       if ($this->db->driverName === 'mysql') {
           // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
           $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
       }  
       $this->createTable('ez_filepath', [
           'id' => Schema::TYPE_INTEGER ."(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '檔案序號'",
           'userid' => Schema::TYPE_INTEGER . " NOT NULL COMMENT '使用者序號'",
           'filename' => Schema::TYPE_STRING . "(255) NULL DEFAULT '' COMMENT '檔案名稱'",
           'filepath' => Schema::TYPE_STRING . "(255) NULL DEFAULT '' COMMENT '檔案路徑'",
           'uploaddate' => Schema::TYPE_TIMESTAMP . " NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上傳時間'",
       ], $tableOptions);
       $this->createIndex('userid', 'ez_filepath', 'userid');
    }

    public function down()
    {
        $this->dropTable('ez_filepath');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

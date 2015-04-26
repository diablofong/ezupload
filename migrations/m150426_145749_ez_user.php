<?php

use yii\db\Schema;
use yii\db\Migration;

class m150426_145749_ez_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('ez_user', [
            'id' => Schema::TYPE_INTEGER ."(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '使用者序號'",
            'account' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '使用者帳號'",
            'password' => Schema::TYPE_STRING . "(255) NOT NULL DEFAULT '' COMMENT '使用者密碼'",
            'username' => Schema::TYPE_STRING . "(11) NOT NULL DEFAULT '' COMMENT '使用者名稱'",
            'email' => Schema::TYPE_STRING . "(100) NOT NULL DEFAULT '' COMMENT '使用者信箱'",
            'role' => Schema::TYPE_STRING . "(1) NULL DEFAULT NULL COMMENT '使用者角色'",
        ], $tableOptions);
        $this->createIndex('account', 'ez_user', 'account');

        $this->insert('ez_user', [
            'id'=>1,
            'account'=>'admin',
            'password'=>'8d5f8aeeb64e3ce20b537d04c486407eaf489646617cfcf493e76f5b794fa080',
            'username'=>'管理者',
            'email'=>'admin@example.com',
            'role'=>'*',
        ]);
    }

    public function down()
    {
        $this->dropTable('ez_user');
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

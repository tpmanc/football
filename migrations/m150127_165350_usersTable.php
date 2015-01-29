<?php

use yii\db\Schema;
use yii\db\Migration;

class m150127_165350_usersTable extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		
		$this->createTable('{{%users}}',[
			'id' => Schema::TYPE_PK,
			'username' => Schema::TYPE_STRING . '(255) NOT NULL',
			'password' => Schema::TYPE_STRING . '(255) NOT NULL',
			'authKey' => Schema::TYPE_STRING . '(32) NOT NULL',
			'accessToken' => Schema::TYPE_STRING . '(255) NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%users}}');
	}
}

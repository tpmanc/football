<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_184053_scoreHistory extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		
		$this->createTable('{{%scoreHistory}}',[
			'id' => Schema::TYPE_PK,
			'playerId' => Schema::TYPE_INTEGER . '(11) NOT NULL',
			'team' => Schema::TYPE_INTEGER . '(1) NOT NULL',
			'score' => Schema::TYPE_INTEGER . '(2) NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%scoreHistory}}');
	}
}

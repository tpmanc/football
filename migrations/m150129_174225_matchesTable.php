<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_174225_matchesTable extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		
		$this->createTable('{{%matches}}',[
			'id' => Schema::TYPE_PK,
			'date' => Schema::TYPE_INTEGER . '(11) NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%matches}}');
	}
}

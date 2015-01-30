<?php

use yii\db\Schema;
use yii\db\Migration;

class m150130_152145_placesTable extends Migration
{
    public function up()
    {
    	$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		
		$this->createTable('{{%places}}',[
			'id' => Schema::TYPE_PK,
			'title' => Schema::TYPE_STRING . '(64) NOT NULL',
			'adress' => Schema::TYPE_STRING . '(255) NOT NULL',
		], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%places}}');
    }
}

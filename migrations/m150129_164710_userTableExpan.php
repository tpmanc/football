<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_164710_userTableExpan extends Migration
{
    public function up()
    {
    	$this->addColumn('{{%users}}', 'name', Schema::TYPE_STRING.'(32) NOT NULL');
    	$this->addColumn('{{%users}}', 'surname', Schema::TYPE_STRING.'(32) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'name');
        $this->dropColumn('{{%users}}', 'surname');
    }
}

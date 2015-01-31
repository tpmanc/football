<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_121725_addIsAdminToUsers extends Migration
{
    public function up()
    {
    	$this->addColumn('{{%users}}', 'isAdmin', Schema::TYPE_BOOLEAN.' NOT NULL DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'isAdmin');
    }
}

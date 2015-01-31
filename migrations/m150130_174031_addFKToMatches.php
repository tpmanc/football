<?php

use yii\db\Schema;
use yii\db\Migration;

class m150130_174031_addFKToMatches extends Migration
{
    public function up()
    {
    	$this->createIndex('FK_match_place', '{{%matches}}', 'placeId');
        $this->addForeignKey('FK_match_place', '{{%matches}}', 'placeId', '{{%places}}', 'id', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropForeignKey('FK_match_place', '{{%matches}}');
        $this->dropIndex('FK_match_place', '{{%matches}}');
    }
}

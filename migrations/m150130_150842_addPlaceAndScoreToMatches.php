<?php

use yii\db\Schema;
use yii\db\Migration;

class m150130_150842_addPlaceAndScoreToMatches extends Migration
{
    public function up()
    {
    	$this->addColumn('{{%matches}}', 'placeId', Schema::TYPE_INTEGER.'(11) NOT NULL');
    	$this->addColumn('{{%matches}}', 'score', Schema::TYPE_STRING.'(6) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%matches}}', 'name');
        $this->dropColumn('{{%matches}}', 'surname');
    }
}

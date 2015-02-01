<?php

use yii\db\Schema;
use yii\db\Migration;

class m150201_192946_addMatchIdToScoreHistory extends Migration
{
    public function up()
    {
    	$this->addColumn('{{%scoreHistory}}', 'matchId', Schema::TYPE_INTEGER.'(11) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%scoreHistory}}', 'matchId');
    }
}

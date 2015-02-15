<?php

namespace app\models;

use Yii;
use app\models\Users;

/**
 * This is the model class for table "scoreHistory".
 *
 * @property integer $id
 * @property integer $playerId
 * @property integer $team
 * @property integer $score
 * @property integer $matchId
 */
class ScoreHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scoreHistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['playerId', 'team', 'score', 'matchId'], 'required'],
            [['playerId', 'team', 'score', 'matchId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'playerId' => 'Игрок',
            'team' => 'Команда',
            'score' => 'Забито мячей',
            'matchId' => 'Матч',
        ];
    }

    public function getPlayer()
    {
        return $this->hasOne(Users::className(), ['id' => 'playerId']);
    }
}

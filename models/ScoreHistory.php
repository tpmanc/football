<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scoreHistory".
 *
 * @property integer $id
 * @property integer $playerId
 * @property integer $team
 * @property integer $score
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
            [['playerId', 'team', 'score'], 'required'],
            [['playerId', 'team', 'score'], 'integer']
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
        ];
    }
}

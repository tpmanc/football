<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $placeId
 * @property string $score
 */
class Matches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'placeId', 'score'], 'required'],
            [['date', 'placeId'], 'integer'],
            [['score'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'placeId' => 'Место игры',
            'score' => 'Счет',
        ];
    }
}

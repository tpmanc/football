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
 *
 * @property Places $place
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
            'placeId' => 'Место',
            'score' => 'Счет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Places::className(), ['id' => 'placeId']);
    }
}

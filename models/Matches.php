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
    public $onlyDate;
    public $onlyTime;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matches';
    }

    public function scenarios()
    {
        return [
            'adminUpdate' => ['onlyDate', 'onlyTime', 'placeId', 'score'],
            'adminCreate' => ['onlyDate', 'onlyTime', 'placeId'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'placeId', 'score'], 'required'],
            [['date', 'placeId'], 'integer'],
            [['score'], 'string', 'max' => 6],

            [['score'], 'validateScore', 'on' => 'adminUpdate'],
            [['onlyDate'], 'validateOnlyDate', 'on' => ['adminUpdate','adminCreate']],
            [['onlyTime'], 'validateOnlyTime', 'on' => ['adminUpdate','adminCreate']],
            [['onlyDate', 'onlyTime'] ,'required', 'on' => ['adminUpdate','adminCreate']],
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
            'onlyDate' => 'Дата матча',
            'onlyTime' => 'Время начала',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Places::className(), ['id' => 'placeId']);
    }

    public function validateScore($attribute, $params)
    {
        if( !preg_match('/^[0-9]{1,2}\:[0-9]{1,2}$/', $this->$attribute) ){
            $this->addError($attribute, 'Неправильный формат счета (2:5)');
        }
    }

    public function validateOnlyDate($attribute, $params)
    {
        if( !preg_match('/^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$/', $this->$attribute) ){
            $this->addError($attribute, 'Неправильный формат даты (dd.mm.yyyy)');
        }
    }

    public function validateOnlyTime($attribute, $params)
    {
        if( !preg_match('/^[0-9]{2}\:[0-9]{2}$/', $this->$attribute) ){
            $this->addError($attribute, 'Неправильный формат времени (hh:mm)');
        }
    }
}

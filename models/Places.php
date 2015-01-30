<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property integer $id
 * @property string $title
 * @property string $adress
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'adress'], 'required'],
            [['title'], 'string', 'max' => 64],
            [['adress'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'adress' => 'Адрес',
        ];
    }
}

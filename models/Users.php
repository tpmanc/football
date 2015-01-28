<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord
{
	public $password2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }
	
	public function scenarios()
	{
		return [
			'registration' => ['username', 'password','password2'],
			'login' => ['username', 'password'],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken'], 'required'],
            [['username', 'password', 'accessToken', 'password2'], 'string', 'max' => 255],
            [['authKey'], 'string', 'max' => 32],
			[['password2'], 'required', 'on' => 'registration'],
			[['password'], 'string', 'min' => 6, 'on' => 'registration'],
			['password', 'compare', 'compareAttribute' => 'password2', 'on' => 'registration'],
			[['username'], 'unique', 'on' => 'registration'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}

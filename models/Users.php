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
 * @property string $name
 * @property string $surname
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
			'registration' => ['username', 'password','password2', 'name', 'surname'],
			'login' => ['username', 'password'],
            'adminUpdate' => ['username', 'password', 'name', 'surname', 'isAdmin'],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'name', 'surname', 'isAdmin'], 'required'],
            [['username', 'password', 'accessToken', 'password2'], 'string', 'max' => 255],
            [['authKey', 'name', 'surname'], 'string', 'max' => 32],
            [['isAdmin'], 'boolean'],
			[['password2'], 'required', 'on' => 'registration'],
			[['password'], 'string', 'min' => 6, 'on' => 'registration'],
			['password', 'compare', 'compareAttribute' => 'password2', 'on' => 'registration'],
			[['username'], 'unique', 'on' => ['registration','adminUpdate']],
        ];
    }

    public static function getAllUsers()
    {
        $users = Users::find()->asArray()->all();
        $return = [];
        // $return[0] = 'Автогол';
        foreach ($users as $user) {
            $return[$user['id']] = $user['name'].' '.$user['surname'];
        }
        return $return;
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
            'name' => 'Имя',
            'surname' => 'Фамилия',
        ];
    }
}

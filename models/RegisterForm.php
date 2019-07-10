<?php

namespace app\models;


use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password2;

    public function rules()
    {
        return [
            [['email', 'password', 'password2', 'name'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            [['password', 'password2'], 'string', 'min' => 6],
            ['password2', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function setPassword()
    {
        return \Yii::$app->security->generatePasswordHash($this->password);
    }
}
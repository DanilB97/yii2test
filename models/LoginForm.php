<?php

namespace app\models;


use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'passwordValidate']
        ];
    }

    public function getUser()
    {
        return User::findOne(['email' => $this->email]);
    }

    public function passwordValidate($attribute, $params)
    {
        $user = $this->getUser();
        if (!$user || !$user->checkPassword($this->password))
            $this->addError($attribute, 'Incorrect Email or Password');

    }

    public function login()
    {
        $user = $this->getUser();
        if ($this->validate())
            return \Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        return false;
    }

}
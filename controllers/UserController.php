<?php

namespace app\controllers;


use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;

class UserController extends Controller
{
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionView($id)
    {
        $user = User::findIdentity($id);

        if (!isset($user))
            throw new HttpException(404, 'Cannot find this user!');

        return $this->render('view', [
            'user' => $user,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
            return $this->goHome();

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();

        $model = new RegisterForm();
        $user = new User();

        if ($model->load(Yii::$app->request->post())) {
            $user->name = $model->name;
            $user->email = $model->email;
            $user->password = $model->setPassword();
            if ($user->save())
                return Yii::$app->getResponse()->redirect(Url::to('login'));
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }
}
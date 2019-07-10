<?php

namespace app\controllers;


use yii\web\Controller;

class ProductController extends Controller
{
    public function actionView($id)
    {
        return $this->render('view', [

        ]);
    }
}
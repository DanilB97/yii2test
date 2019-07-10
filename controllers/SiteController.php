<?php

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::getAll();
        $latestProducts = Product::find()->orderBy('id DESC')->limit(8)->asArray()->all();

        return $this->render('index', [
            'latestProducts' => $latestProducts,
            'categories' => $categories,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
}
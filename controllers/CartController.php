<?php

namespace app\controllers;


use app\models\Cart;
use app\models\Product;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class CartController extends Controller
{

    public function actionIndex()
    {
        $cart = Cart::getAll();
        $total = 0;

        return $this->render('index', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    public function actionAdd($id)
    {
        $id = intval($id);
        $product = Product::findOne($id);

        if (!\Yii::$app->user->isGuest && isset($product)) {
            $session = \Yii::$app->session;
            $session->open();

            Cart::addToCart($product);
        }

    }

    public function actionClear()
    {
        Cart::clear();
        return Yii::$app->getResponse()->redirect(Url::to('/cart'));
    }

    public function actionBuy()
    {
        Cart::buy();
        return Yii::$app->getResponse()->redirect(Url::to('/cart'));
    }

}
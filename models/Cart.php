<?php

namespace app\models;


class Cart
{
    public static function addToCart(Product $product, $qty = 1)
    {
        $qty = intval($qty);
        if (!isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'img' => $product->img,
                'name' => $product->name,
                'price' => $product->price
            ];
        } else unset($_SESSION['cart'][$product->id]);
    }

    public static function clear()
    {
        unset($_SESSION['cart']);
    }

    public static function buy()
    {
        unset($_SESSION['cart']);
    }

    public static function getAll()
    {
        return $_SESSION['cart'];
    }

}
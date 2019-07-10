<?php

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller
{
    /**
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function actionView($id)
    {
        $categoryName = Category::getCategoryNameById($id)['name'];
        if ($categoryName === null) throw new HttpException(404, 'Cannot find this category');

        $categories = Category::getAll();
        $products = Product::getByCategory($id);

        return $this->render('view', [
            'categories' => $categories,
            'categoryName' => $categoryName,
            'products' => $products,
        ]);
    }
}
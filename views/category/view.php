<?php
/**
 * @var $this \yii\web\View
 * @var $categories array
 * @var $categoryName string
 */
use yii\helpers\Html;

$this->title = 'Category';
?>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-xs-0 left-side">
            <h3 align="center">Category</h3>

            <div id="sidebar" class="row menu-category center-block col-lg-12 col-xs-12" role="navigation">
                <div class="list-group">

                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $item): ?>
                            <?= Html::a($item['name'], ['category/view', 'id' => $item['id']], ['class' => 'list-group-item']) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-9 col-xs-10 right-side">
            <h3 align="center"><?= Html::encode($categoryName) ?></h3>

            <div class="row center-block">
                <div class="row">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-5 col-md-3">
                                <div class="thumbnail goods-item">
                                    <a href="/product/<?= $product['id'] ?>" class="center-block">
                                        <?= Html::img("/web/product/{$product['img']}", ['alt' => 'Error_Image']) ?>
                                    </a>
                                    <div class="caption">
                                        <h4 align="center"><a
                                                    href="/product/<?= $product['id'] ?>"><?= $product['name'] ?></a>
                                        </h4>
                                        <h4 align="center"><?= $product['price'] ?> р.</h4>
                                        <p>
                                            <a href="#" class="btn btn-default " role="button"><span
                                                        class="glyphicon glyphicon-heart"></span></a>
                                            <a href="/cart/add/<?= $product['id'] ?>" id="<?= $product['id'] ?>"
                                               class="btn btn-default btn-cart <?php if (isset($_SESSION['cart'][$product['id']])) echo 'btn-cart-added' ?>"
                                               role="button"><span
                                                        class="glyphicon glyphicon-shopping-cart"></span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
<?php
/**
 * @var $total integer
 * @var $this \yii\web\View
 * @var $cart \app\models\Cart
 */
$this->title = 'Cart';
use yii\helpers\Html;

?>
<h1 class="text-center"><?= Html::encode($this->title) ?></h1>
<div class="center-block table-responsive" id="cart-table">
    <table class="table table-striped" id="" align="center">
        <tbody>
        <tr>
            <td>product</td>
            <td>quantity</td>
            <td>price</td>
        </tr>
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $product): ?>
                <tr>
                    <td class="col-md-6"><?= Html::img("web/product/{$product['img']}", ['alt' => 'Error_Image']) ?><?= $product['name'] ?></td>
                    <td class="col-md-2"><?= $product['qty'] ?></td>
                    <td class="col-md-2"><?= $product['price'] ?>p.</td>
                </tr>
                <?php
                $total += $product['price'] * $product['qty'];
            endforeach; ?>
            <tr>
                <td>Total: <?= $total ?>p.</td>
                <td ><a id="buy-cart" href="/cart/buy">Buy All</a></td>
                <td ><a id="clear-cart" href="/cart/clear">Clear</a></td>
            </tr>
        <?php else: ?>
            <tr>
                <td>Your cart is empty!</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>
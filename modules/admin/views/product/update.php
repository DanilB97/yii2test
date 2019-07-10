<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $categories array */

$this->title = 'Update Product: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>

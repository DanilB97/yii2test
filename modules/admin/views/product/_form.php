<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($model, 'id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'price')->textInput() ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>

    <?php $row = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::label('Create new Item') ?>

    <?= $row->field($model, 'img')->label('Image')->fileInput() ?>

    <?= $row->field($model, 'category_id')->label('Category')->textInput()->dropDownList($categories) ?>

    <?= $row->field($model, 'name')->textInput(['autofocus' => true]) ?>

    <?= $row->field($model, 'price')->textInput() ?>

    <?= Html::submitButton('Create', ['class' => 'btn btn-success center-block']) ?>

    <?php ActiveForm::end() ?>

</div>

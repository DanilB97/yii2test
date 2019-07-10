<?php
/** @var $this yii\web\View
 * @var $categories array
 * @var $model app\models\CreateItemForm
 */

$this->title = 'Add new item';

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container-fluid">
    <div class="row">
        <div class="login-form-inner center-block">

            <?php $row = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= Html::label('Create new Item') ?>

            <?= $row->field($model, 'img')->label('Image')->fileInput() ?>

            <?= $row->field($model, 'category_id')->label('Category')->textInput()->dropDownList($categories) ?>

            <?= $row->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $row->field($model, 'price')->textInput() ?>

            <?= Html::submitButton('Create', ['class' => 'btn btn-success center-block']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>

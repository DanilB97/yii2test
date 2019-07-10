<?php

/**
 * @var $model
 */

$this->title = 'register';

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row">
        <div class="login-form-inner center-block">
            <?php $row = ActiveForm::begin() ?>

            <?= $row->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $row->field($model, 'email')->textInput() ?>

            <?= $row->field($model, 'password')->passwordInput() ?>

            <?= $row->field($model, 'password2')->passwordInput()->label('Confirm password') ?>

            <?= Html::submitButton('Register', ['class' => 'btn btn-success center-block']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



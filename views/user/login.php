<?php
/**
 * @var $this string
 * @var $model
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Auth'
?>
<div class="container-flud">
    <div class="login-form-inner center-block">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'center-block col-xs-4 login-form']
        ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <?= Html::submitButton('Login', ['class' => ['btn btn-success center-block'], 'name' => 'login']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

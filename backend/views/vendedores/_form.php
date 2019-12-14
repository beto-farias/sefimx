<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntVendedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-vendedores-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_telefono')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntDirecciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-direcciones-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'txt_calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_numero_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_numero_int')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_primaria')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

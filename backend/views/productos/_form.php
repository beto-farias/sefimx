<?php

use common\models\CatProveedores;
use common\models\CatTiposProductos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-productos-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_proveedor')
            ->dropDownList(CatProveedores::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'id_tipo_producto')
            ->dropDownList(CatTiposProductos::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'txt_clave_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_descripcion')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use common\models\CatTiposProductos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WrkClientesProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wrk-clientes-productos-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'id_producto') ->dropDownList(CatTiposProductos::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'id_cliente_producto_padre')->textInput() ?>

    <?= $form->field($model, 'txt_folio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fch_contratacion')->textInput() ?>

    <?= $form->field($model, 'fch_renovacion')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WrkClientesProductosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wrk-clientes-productos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente_producto') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_cliente_producto_padre') ?>

    <?php // echo $form->field($model, 'txt_folio') ?>

    <?php // echo $form->field($model, 'txt_notas') ?>

    <?php // echo $form->field($model, 'fch_contratacion') ?>

    <?php // echo $form->field($model, 'fch_renovacion') ?>

    <?php // echo $form->field($model, 'create_usr') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_usr') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesProductosDocumentosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-clientes-productos-documentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente_producto_documento') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'id_cliente_producto') ?>

    <?= $form->field($model, 'id_tipo_documentos') ?>

    <?= $form->field($model, 'txt_notas') ?>

    <?php // echo $form->field($model, 'fch_vencimiento') ?>

    <?php // echo $form->field($model, 'b_descargable') ?>

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

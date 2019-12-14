<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesClientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-clientes-clientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente_cliente') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_cliente_relacion') ?>

    <?= $form->field($model, 'id_tipo_relacion') ?>

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

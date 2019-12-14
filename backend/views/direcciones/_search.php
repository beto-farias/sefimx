<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntDireccionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-direcciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'txt_calle') ?>

    <?= $form->field($model, 'txt_numero_ext') ?>

    <?php // echo $form->field($model, 'txt_numero_int') ?>

    <?php // echo $form->field($model, 'txt_colonia') ?>

    <?php // echo $form->field($model, 'txt_municipio') ?>

    <?php // echo $form->field($model, 'txt_estado') ?>

    <?php // echo $form->field($model, 'txt_ciudad') ?>

    <?php // echo $form->field($model, 'txt_cp') ?>

    <?php // echo $form->field($model, 'b_primaria') ?>

    <?php // echo $form->field($model, 'create_usr') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_usr') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <?php // echo $form->field($model, 'ent_direccionescol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

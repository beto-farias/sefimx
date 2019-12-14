<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntMediosContactosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-medios-contactos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_medio_contacto') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_tipo_medio_contacto') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?php // echo $form->field($model, 'txt_descripcion') ?>

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

<?php

use common\models\CatTiposMediosContatos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntMediosContactos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-medios-contactos-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'id_tipo_medio_contacto')
        ->dropDownList(CatTiposMediosContatos::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->errorSummary($model); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

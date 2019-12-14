<?php

use common\models\CatTiposRelacionesClientes;
use common\models\EntClientes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesClientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-clientes-clientes-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'id_cliente_relacion')
     ->dropDownList(EntClientes::getArrayDropDown(), 
     ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'id_tipo_relacion')
    ->dropDownList(CatTiposRelacionesClientes::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

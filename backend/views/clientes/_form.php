<?php

use common\models\EntVendedores;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntClientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-clientes-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'id_vendedor')->dropDownList(EntVendedores::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>
                
    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true]) ?>

    

    <?php echo $form->field($model, 'fch_nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha de nacimiento ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
    ?>


   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

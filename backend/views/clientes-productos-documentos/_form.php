<?php

use common\models\CatTiposDocumentos;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesProductosDocumentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-clientes-productos-documentos-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'id_tipo_documentos')
        ->dropDownList(CatTiposDocumentos::getArrayDropDown(), 
                ['prompt'=>'Seleccionar...']); ?>

    <?= $form->field($model, 'txt_notas')->textInput(['maxlength' => true]) ?>

   
    <?php echo $form->field($model, 'fch_vencimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha de vencimiento ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'b_descargable')->textInput() ?>

    <?= $form->field($model,'documentFile')->fileInput() ?>

    <?=$form->errorSummary($model)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesProductosDocumentos */

$this->title = 'Update Rel Clientes Productos Documentos: ' . $model->id_cliente_producto_documento;
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Productos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_producto_documento, 'url' => ['view', 'id' => $model->id_cliente_producto_documento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rel-clientes-productos-documentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

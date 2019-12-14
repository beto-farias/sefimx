<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesProductosDocumentos */

$this->title = $model->id_cliente_producto_documento;
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Productos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rel-clientes-productos-documentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cliente_producto_documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cliente_producto_documento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
           
            [
                'label'=>'Producto',
                'value'=>$model->clienteProducto->producto->txt_nombre,
            ],
            [
                'label'=>'Documento',
                'value'=>$model->tipoDocumentos->txt_nombre,
            ],
            'txt_notas',
            'fch_vencimiento',
            'b_descargable',
            
        ],
    ]) ?>

</div>

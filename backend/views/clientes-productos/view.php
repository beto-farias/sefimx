<?php

use common\models\RelClientesProductosDocumentos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WrkClientesProductos */

$this->title = $model->producto->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Wrk Clientes Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wrk-clientes-productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'label'=>'Cliente',
                'format'=>'raw',
                'value'=>Html::a($model->cliente->nombreCompleto, ['expediente/index','uuid'=>$model->cliente->uuid]) 
            ],
           
            [
                'label'=>'Producto',
                'value'=>$model->producto->txt_nombre
            ],
            'id_cliente_producto_padre',
            'txt_folio',
            'txt_notas',
            'fch_contratacion',
            'fch_renovacion',
            
        ],
    ]) ?>


<p>Documentos</p>

<?= Html::a('Agregar documento', ['/clientes-productos-documentos/create','uuidProducto'=>$model->uuid], ['class'=>'btn btn-primary']) ?>

<?
    $modelData = $model->relClientesProductosDocumentos;
    $labelModel = new RelClientesProductosDocumentos();
?>
<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
            <th><?=$labelModel->getAttributeLabel('id_tipo_documentos')?></th>
            <th><?=$labelModel->getAttributeLabel('txt_notas')?></th>
            <th><?=$labelModel->getAttributeLabel('fch_vencimiento')?></th>
            <th><?=$labelModel->getAttributeLabel('b_descargable')?></th>
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach($modelData  as $item ):  ?> 
            <tr>
              <td><?=$item->tipoDocumentos->txt_nombre ?></td>
              <td><?=$item->txt_notas ?></td>
              <td><?=$item->fch_vencimiento ?></td>
              <td><?=$item->b_descargable?'Si':'No' ?></td>
              

        <td>
            <!--a href="<?=Url::base()?>/clientes-productos-documentos/update?uuid=<?=$item->uuid?>">update</a>
            <a href="<?=Url::base()?>/clientes-productos-documentos/view?uuid=<?=$item->uuid?>">view</a-->
            <a href="<?=Url::base()?>/clientes-productos-documentos/download?uuid=<?=$item->uuid?>" target="_blank">Descargar</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

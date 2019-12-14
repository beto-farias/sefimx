<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RelClientesProductosDocumentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rel Clientes Productos Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rel Clientes Productos Documentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                        
            <th>id_cliente_producto</th>
            <th>id_tipo_documentos</th>
            <th>txt_notas</th>
            <th>fch_vencimiento</th>
            <th>b_descargable</th>
            
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>
                              
              <td><?=$item->id_cliente_producto ?></td>
              <td><?=$item->id_tipo_documentos ?></td>
              <td><?=$item->txt_notas ?></td>
              <td><?=$item->fch_vencimiento ?></td>
              <td><?=$item->b_descargable ?></td>
             

        <td>
            <a href="update?uuid=<?=$item->uuid?>">update</a>
            <a href="view?uuid=<?=$item->uuid?>">view</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

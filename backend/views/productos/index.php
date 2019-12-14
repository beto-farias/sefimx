<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CatProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cat Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                
            <th>id_proveedor</th>
            <th>id_tipo_producto</th>
            <th>txt_clave_producto</th>
            <th>txt_nombre</th>
            <th>txt_descripcion</th>
            
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>
                              
              <td><?=$item->id_proveedor ?></td>
              <td><?=$item->id_tipo_producto ?></td>
              <td><?=$item->txt_clave_producto ?></td>
              <td><?=$item->txt_nombre ?></td>
              <td><?=$item->txt_descripcion ?></td>
              

        <td>
            <a href="update?uuid=<?=$item->uuid?>">update</a>
            <a href="view?uuid=<?=$item->uuid?>">view</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

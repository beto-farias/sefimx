<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CatTiposProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Tipos Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cat Tipos Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                        
            <th>txt_nombre</th>
            <th>txt_descripcion</th>
           
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>
                             
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

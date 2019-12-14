<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ent Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ent Clientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                        
            <th>txt_nombre</th>
            <th>txt_apellido_paterno</th>
            <th>txt_apellido_materno</th>
            <th>txt_rfc</th>
           
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>              
              <td><?=$item->txt_nombre ?></td>
              <td><?=$item->txt_apellido_paterno ?></td>
              <td><?=$item->txt_apellido_materno ?></td>
              <td><?=$item->txt_rfc ?></td>

        <td>
            <a href="update?uuid=<?=$item->uuid?>">update</a>
            <a href="view?uuid=<?=$item->uuid?>">view</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

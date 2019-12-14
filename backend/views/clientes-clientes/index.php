<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RelClientesClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rel Clientes Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rel Clientes Clientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                        <th>id_cliente_cliente</th>
            <th>uuid</th>
            <th>id_cliente</th>
            <th>id_cliente_relacion</th>
            <th>id_tipo_relacion</th>
            <th>create_usr</th>
            <th>create_date</th>
            <th>update_usr</th>
            <th>update_date</th>
            <th>b_habilitado</th>
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>
                              <td><?=$item->id_cliente_cliente ?></td>
              <td><?=$item->uuid ?></td>
              <td><?=$item->id_cliente ?></td>
              <td><?=$item->id_cliente_relacion ?></td>
              <td><?=$item->id_tipo_relacion ?></td>
              <td><?=$item->create_usr ?></td>
              <td><?=$item->create_date ?></td>
              <td><?=$item->update_usr ?></td>
              <td><?=$item->update_date ?></td>
              <td><?=$item->b_habilitado ?></td>

        <td>
            <a href="update?uuid=<?=$item->uuid?>">update</a>
            <a href="view?uuid=<?=$item->uuid?>">view</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

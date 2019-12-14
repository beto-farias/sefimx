<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntDireccionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ent Direcciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ent Direcciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<table class="tbl tbl-striped">
    <thead>
        <tr>
                        <th>id_</th>
            <th>uuid</th>
            <th>id_cliente</th>
            <th>txt_calle</th>
            <th>txt_numero_ext</th>
            <th>txt_numero_int</th>
            <th>txt_colonia</th>
            <th>txt_municipio</th>
            <th>txt_estado</th>
            <th>txt_ciudad</th>
            <th>txt_cp</th>
            <th>b_primaria</th>
            <th>create_usr</th>
            <th>create_date</th>
            <th>update_usr</th>
            <th>update_date</th>
            <th>b_habilitado</th>
            <th>ent_direccionescol</th>
            <th>Actions</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach(  $modelData  as $item ):  ?> 
            <tr>
                              <td><?=$item->id_ ?></td>
              <td><?=$item->uuid ?></td>
              <td><?=$item->id_cliente ?></td>
              <td><?=$item->txt_calle ?></td>
              <td><?=$item->txt_numero_ext ?></td>
              <td><?=$item->txt_numero_int ?></td>
              <td><?=$item->txt_colonia ?></td>
              <td><?=$item->txt_municipio ?></td>
              <td><?=$item->txt_estado ?></td>
              <td><?=$item->txt_ciudad ?></td>
              <td><?=$item->txt_cp ?></td>
              <td><?=$item->b_primaria ?></td>
              <td><?=$item->create_usr ?></td>
              <td><?=$item->create_date ?></td>
              <td><?=$item->update_usr ?></td>
              <td><?=$item->update_date ?></td>
              <td><?=$item->b_habilitado ?></td>
              <td><?=$item->ent_direccionescol ?></td>

        <td>
            <a href="update?uuid=<?=$item->uuid?>">update</a>
            <a href="view?uuid=<?=$item->uuid?>">view</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

</div>

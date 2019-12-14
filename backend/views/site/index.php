<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'SEFIMX';


$this->registerJsFile("@web/js/site/index.js",[
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);
?>


<div class="site-index">
    <div>
        <p>Acciones</p>
        <ul>
            <li><?= Html::a('Agregar Cliente', ['/clientes/create'], ['class'=>'btn btn-primary']) ?></li>
        </ul>
    </div>

    <div>

    <table id="clientes_tbl" name="clientes_tbl" class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
                        
            <th>Nombre</th>
            <th>RFC</th>
           
            <th>Acciones</th>
        </tr>
    <thead>
    <tbody>
    <?php foreach( $modelData  as $item ):  ?> 
            <tr>              
              <td><?=$item->nombreCompleto ?></td>
              <td><?=$item->txt_rfc ?></td>

        <td>
            <a href="<?=Url::base()?>/expediente/index?uuid=<?=$item->uuid?>">Ver expediente</a>
        </td>
                
            </tr>
    <?php endforeach ?> 
   
    </tbody>
</table>

    </div>
</div>

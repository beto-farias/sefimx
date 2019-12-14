<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->registerJsFile("@web/js/expediente/index.js",[
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);

?>

<p>Expediente de: <?=$model->nombreCompleto?></p>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#cliente" role="tab" data-toggle="tab">Datos personales</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#vendedor" role="tab" data-toggle="tab">Vendedor</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#documentos" role="tab" data-toggle="tab">Documentos Personales</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#polizas" role="tab" data-toggle="tab">Pólizas</a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="#direcciones" role="tab" data-toggle="tab">Direcciones</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#contacto" role="tab" data-toggle="tab">Contacto</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#relaciones" role="tab" data-toggle="tab">Relaciones</a>
    </li>

</ul>




<div class="tab-content">
    <div role="tabpanel" class="tab-pane  active" id="cliente">

        <p>cliente:</p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'txt_nombre',
                'txt_apellido_paterno',
                'txt_apellido_materno',
                'txt_rfc',
                'fch_nacimiento',

            ],
        ]) ?>


    </div>

    <div role="tabpanel" class="tab-pane fade" id="vendedor">

        <p>Vendedor:</p>

        <?= DetailView::widget([
            'model' => $model->vendedor,
            'attributes' => [

                'txt_nombre',
                'txt_descripcion',
                'txt_correo',
                'txt_telefono',

            ],
        ]) ?>

    </div>

    <div role="tabpanel" class="tab-pane fade" id="documentos">

        <p>Documentos personales:</p>
        

        <?php
        $modelData = $model->relClientesDocumentos;
        ?>

        <table class="table table-striped table-bordered detail-view">
            <thead>
                <tr>
                    <th>id_tipo_documentos</th>
                    <th>txt_notas</th>
                    <th>fch_vencimiento</th>
                    <th>Actions</th>
                </tr>
                <thead>
                <tbody>
                    <?php foreach ($modelData  as $item) :  ?>

                        <td><?= $item->tipoDocumentos->txt_nombre ?></td>
                        <td><?= $item->txt_notas ?></td>
                        <td><?= $item->fch_vencimiento ?></td>
                        <td>
                            <a href="update?uuid=<?= $item->uuid ?>">update</a>
                            <a href="view?uuid=<?= $item->uuid ?>">view</a>
                            <a href="<?= Url::base() ?>/clientes-documentos/download?uuid=<?= $item->uuid ?>" target="_blank">Descargar</a>
                        </td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>

        <?= Html::a('Agregar documento', ['/clientes-documentos/create', 'uuidCliente' => $model->uuid], ['class' => 'btn btn-primary']) ?>

    </div>

    <div role="tabpanel" class="tab-pane fade" id="polizas">

        <p>Pólizas:</p>

       

        <?php
        $modelData = $model->wrkClientesProductos;
        ?>

        <table id="poliza_tbl" class="table table-striped table-bordered detail-view">
            <thead>
                <tr>
                    <th>Aseguradora</th>
                    <th>Tipo de producto</th>
                    <th>producto</th>
                    <th>Contrato padre</th>
                    <th>Número de póliza</th>
                    <th>Notas</th>
                    <th>Inicio de vigencia</th>
                    <th>Fin de vigencia</th>
                    <th>Acciones</th>
                </tr>
                <thead>
                <tbody>
                    <?php foreach ($modelData  as $item) :  ?>
                        <tr>
                            <td><?= $item->producto->proveedor->txt_nombre ?></td>
                            <td><?= $item->producto->tipoProducto->txt_nombre ?></td>
                            <td><?= $item->producto->txt_nombre ?></td>
                            <td><?= $item->id_cliente_producto_padre ?></td>
                            <td><a href="<?= Url::base(true) ?>/clientes-productos/view?uuid=<?= $item->uuid ?>"><?= $item->txt_folio ?></a></td>
                            <td><?= $item->txt_notas ?></td>
                            <td><?= $item->fch_contratacion ?></td>
                            <td><?= $item->fch_renovacion ?></td>


                            <td>
                                <a href="<?= Url::base(true) ?>/clientes-productos/update?uuid=<?= $item->uuid ?>">update</a>
                                <a href="<?= Url::base(true) ?>/clientes-productos/view?uuid=<?= $item->uuid ?>">view</a>
                            </td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>

        <?= Html::a('Agregar póliza o endoso', ['/clientes-productos/create', 'uuidCliente' => $model->uuid], ['class' => 'btn btn-primary']) ?>


    </div>

    <div role="tabpanel" class="tab-pane fade" id="direcciones">

        <p>direcciones:</p>

       
        <?php
        $modelData = $model->entDirecciones;
        ?>
        <table class="table table-striped table-bordered detail-view">
            <thead>
                <tr>

                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>CP</th>
                    <th>Direccion principal</th>
                    <th>Acciones</th>
                </tr>
                <thead>
                <tbody>
                    <?php foreach ($modelData  as $item) :  ?>
                        <tr>

                            <td><?= $item->txt_calle ?> <?= $item->txt_numero_ext ?> <?= $item->txt_numero_int ?> <?= $item->txt_colonia ?> <?= $item->txt_municipio ?></td>
                            <td><?= $item->txt_estado ?></td>
                            <td><?= $item->txt_ciudad ?></td>
                            <td><?= $item->txt_cp ?></td>
                            <td><?= $item->b_primaria?'Si':'No' ?></td>
                            <td>
                                <a href="<?= Url::base(true) ?>/direcciones/update?uuid=<?= $item->uuid ?>">update</a>
                                <a href="<?= Url::base(true) ?>/direcciones/view?uuid=<?= $item->uuid ?>">view</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>

        <?= Html::a('Agregar dirección', ['/direcciones/create', 'uuidCliente' => $model->uuid], ['class' => 'btn btn-primary']) ?>


    </div>

    <div role="tabpanel" class="tab-pane fade" id="contacto">

        <p>Contacto:</p>

       

        <?php
        $modelData = $model->entMediosContactos;
        ?>
        <table class="table table-striped table-bordered detail-view">
            <thead>
                <tr>
                    <th>Tipo de contacto</th>
                    <th>Contacto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                <thead>
                <tbody>
                    <?php foreach ($modelData  as $item) :  ?>
                        <tr>
                            <td><?= $item->tipoMedioContacto->txt_nombre ?></td>
                            <td><?= $item->txt_nombre ?></td>
                            <td><?= $item->txt_descripcion ?></td>
                            <td>
                                <a href="<?= Url::base(true) ?>web/medios-contactos/update?uuid=<?= $item->uuid ?>">update</a>
                                <a href="<?= Url::base(true) ?>web/medios-contactos/view?uuid=<?= $item->uuid ?>">view</a>
                            </td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>

        <?= Html::a('Agregar medio de contacto', ['/medios-contactos/create', 'uuidCliente' => $model->uuid], ['class' => 'btn btn-primary']) ?>


    </div>

    <div role="tabpanel" class="tab-pane fade" id="relaciones">

        <p>Clientes relacionados:</p>

        
        <?php
        $modelData = $model->relClientesClientes;
        ?>

        <table class="table table-striped table-bordered detail-view">
            <thead>
                <tr>


                    <th>Relación con:</th>
                    <th>Tipo de relación</th>

                    <th>Actions</th>
                </tr>
                <thead>
                <tbody>
                    <?php foreach ($modelData  as $item) :  ?>
                        <tr>
                            <td>
                                <a href="<?= Url::base(true) ?>/expediente/index?uuid=<?= $item->clienteRelacion->uuid ?>"><?= $item->clienteRelacion->nombreCompleto ?></a>
                            </td>
                            <td><?= $item->tipoRelacion->txt_nombre ?></td>
                            <td>
                                <a href="<?= Url::base(true) ?>web/clientes-clientes/update?uuid=<?= $item->uuid ?>">update</a>
                                <a href="<?= Url::base(true) ?>web/clientes-clientes/view?uuid=<?= $item->uuid ?>">view</a>
                            </td>
                            
                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>

        <?= Html::a('Relacionar cliente', ['/clientes-clientes/create', 'uuidCliente' => $model->uuid], ['class' => 'btn btn-primary']) ?>


    </div>
</div>
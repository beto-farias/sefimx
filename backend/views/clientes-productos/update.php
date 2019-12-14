<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WrkClientesProductos */

$this->title = 'Update Wrk Clientes Productos: ' . $model->id_cliente_producto;
$this->params['breadcrumbs'][] = ['label' => 'Wrk Clientes Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_producto, 'url' => ['view', 'id' => $model->id_cliente_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wrk-clientes-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

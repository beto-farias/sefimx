<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesClientes */

$this->title = 'Update Rel Clientes Clientes: ' . $model->id_cliente_cliente;
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_cliente, 'url' => ['view', 'id' => $model->id_cliente_cliente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rel-clientes-clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

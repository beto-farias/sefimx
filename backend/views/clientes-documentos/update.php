<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesDocumentos */

$this->title = 'Update Rel Clientes Documentos: ' . $model->id_cliente_documento;
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_documento, 'url' => ['view', 'id' => $model->id_cliente_documento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rel-clientes-documentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

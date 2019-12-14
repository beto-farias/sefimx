<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesDocumentos */

$this->title = $model->id_cliente_documento;
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rel-clientes-documentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cliente_documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cliente_documento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cliente_documento',
            'uuid',
            'id_cliente',
            'id_tipo_documentos',
            'txt_notas',
            'fch_vencimiento',
            'create_usr',
            'create_date',
            'update_usr',
            'update_date',
            'b_habilitado',
        ],
    ]) ?>

</div>

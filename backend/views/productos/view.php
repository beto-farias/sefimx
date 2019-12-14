<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CatProductos */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Cat Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_producto], [
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
            'id_producto',
            'uuid',
            'id_proveedor',
            'id_tipo_producto',
            'txt_clave_producto',
            'txt_nombre',
            'txt_descripcion',
            'create_usr',
            'create_date',
            'update_usr',
            'update_date',
            'b_habilitado',
        ],
    ]) ?>

</div>

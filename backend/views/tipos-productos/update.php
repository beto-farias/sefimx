<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposProductos */

$this->title = 'Update Cat Tipos Productos: ' . $model->id_tipo_producto;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_producto, 'url' => ['view', 'id' => $model->id_tipo_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tipos-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

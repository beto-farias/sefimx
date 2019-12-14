<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProductos */

$this->title = 'Update Cat Productos: ' . $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Cat Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id' => $model->id_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

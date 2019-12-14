<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProveedores */

$this->title = 'Update Cat Proveedores: ' . $model->id_proveedor;
$this->params['breadcrumbs'][] = ['label' => 'Cat Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proveedor, 'url' => ['view', 'id' => $model->id_proveedor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-proveedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

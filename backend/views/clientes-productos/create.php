<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WrkClientesProductos */

$this->title = 'Create Wrk Clientes Productos';
$this->params['breadcrumbs'][] = ['label' => 'Wrk Clientes Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrk-clientes-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

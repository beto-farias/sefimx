<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesProductosDocumentos */

$this->title = 'Create Rel Clientes Productos Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Productos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-clientes-productos-documentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

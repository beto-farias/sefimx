<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesDocumentos */

$this->title = 'Create Rel Clientes Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-clientes-documentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

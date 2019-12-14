<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposRelacionesClientes */

$this->title = 'Update Cat Tipos Relaciones Clientes: ' . $model->id_tipo_relacion;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Relaciones Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_relacion, 'url' => ['view', 'id' => $model->id_tipo_relacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tipos-relaciones-clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelClientesClientes */

$this->title = 'Create Rel Clientes Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Rel Clientes Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-clientes-clientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

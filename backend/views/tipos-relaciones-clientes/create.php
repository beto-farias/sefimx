<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposRelacionesClientes */

$this->title = 'Create Cat Tipos Relaciones Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Relaciones Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-relaciones-clientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposProductos */

$this->title = 'Create Cat Tipos Productos';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

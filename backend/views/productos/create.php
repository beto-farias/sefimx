<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProductos */

$this->title = 'Create Cat Productos';
$this->params['breadcrumbs'][] = ['label' => 'Cat Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

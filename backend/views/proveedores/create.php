<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProveedores */

$this->title = 'Create Cat Proveedores';
$this->params['breadcrumbs'][] = ['label' => 'Cat Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-proveedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

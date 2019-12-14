<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntDirecciones */

$this->title = 'Update Ent Direcciones: ' . $model->id_;
$this->params['breadcrumbs'][] = ['label' => 'Ent Direcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_, 'url' => ['view', 'id' => $model->id_]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-direcciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

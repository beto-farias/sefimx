<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposDocumentos */

$this->title = 'Update Cat Tipos Documentos: ' . $model->id_tipo_documentos;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_documentos, 'url' => ['view', 'id' => $model->id_tipo_documentos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tipos-documentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposDocumentos */

$this->title = $model->id_tipo_documentos;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-tipos-documentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tipo_documentos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tipo_documentos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipo_documentos',
            'uuid',
            'txt_nombre',
            'txt_descripcion',
            'b_documento_cliente',
            'create_usr',
            'create_date',
            'update_usr',
            'update_date',
            'b_habilitado',
        ],
    ]) ?>

</div>

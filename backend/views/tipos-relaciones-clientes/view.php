<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposRelacionesClientes */

$this->title = $model->id_tipo_relacion;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Relaciones Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-tipos-relaciones-clientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tipo_relacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tipo_relacion], [
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
            'id_tipo_relacion',
            'uuid',
            'txt_nombre',
            'txt_descripcion',
            'create_usr',
            'create_date',
            'update_usr',
            'update_date',
            'b_habilitado',
        ],
    ]) ?>

</div>

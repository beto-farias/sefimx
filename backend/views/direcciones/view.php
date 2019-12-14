<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EntDirecciones */

$this->title = $model->id_;
$this->params['breadcrumbs'][] = ['label' => 'Ent Direcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ent-direcciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_], [
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
            'id_',
            'uuid',
            'id_cliente',
            'txt_calle',
            'txt_numero_ext',
            'txt_numero_int',
            'txt_colonia',
            'txt_municipio',
            'txt_estado',
            'txt_ciudad',
            'txt_cp',
            'b_primaria',
            'create_usr',
            'create_date',
            'update_usr',
            'update_date',
            'b_habilitado',
            'ent_direccionescol',
        ],
    ]) ?>

</div>

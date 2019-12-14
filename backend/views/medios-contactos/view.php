<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EntMediosContactos */

$this->title = $model->id_medio_contacto;
$this->params['breadcrumbs'][] = ['label' => 'Ent Medios Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ent-medios-contactos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_medio_contacto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_medio_contacto], [
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
            'id_medio_contacto',
            'uuid',
            'id_cliente',
            'id_tipo_medio_contacto',
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

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntMediosContactos */

$this->title = 'Update Ent Medios Contactos: ' . $model->id_medio_contacto;
$this->params['breadcrumbs'][] = ['label' => 'Ent Medios Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_medio_contacto, 'url' => ['view', 'id' => $model->id_medio_contacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-medios-contactos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

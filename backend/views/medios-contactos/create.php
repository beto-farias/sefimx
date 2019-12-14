<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntMediosContactos */

$this->title = 'Create Ent Medios Contactos';
$this->params['breadcrumbs'][] = ['label' => 'Ent Medios Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-medios-contactos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

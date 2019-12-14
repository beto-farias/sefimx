<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntDirecciones */

$this->title = 'Create Ent Direcciones';
$this->params['breadcrumbs'][] = ['label' => 'Ent Direcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-direcciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

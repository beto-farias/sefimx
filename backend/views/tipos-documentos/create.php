<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatTiposDocumentos */

$this->title = 'Create Cat Tipos Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-documentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

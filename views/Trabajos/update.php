<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trabajos $model */

$this->title = 'Update Trabajos: ' . $model->idtrabajos;
$this->params['breadcrumbs'][] = ['label' => 'Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtrabajos, 'url' => ['view', 'idtrabajos' => $model->idtrabajos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trabajos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

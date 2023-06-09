<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trabajos $model */

$this->title = 'Create Trabajos';
$this->params['breadcrumbs'][] = ['label' => 'Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

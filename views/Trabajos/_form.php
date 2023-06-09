<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Trabajos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trabajos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaI')->textInput() ?>

    <?= $form->field($model, 'fechaF')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

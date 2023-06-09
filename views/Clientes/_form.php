<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['email' ,'maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>
    <?= Html::img($model->logo,['width'=>'60px']); ?>

    <?= $form->field($model, 'archivo')-> fileInput() ?>

    <?= $form->field($model, 'fechaAlta')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

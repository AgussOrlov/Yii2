<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

?>


<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus'=>true]);  ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput()?>
            <div class="form-group">
                <?= Html::submitButton('Signup' ,['class' => 'btn btn-primary'])  ?>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>


</div>
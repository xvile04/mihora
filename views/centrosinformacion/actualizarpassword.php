<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
?>
<div class="actualizarpassword">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'actualPassword')->input('password')?>
    
        <?= $form->field($model, 'newPassword')->input('password') ?>
    
        <?= $form->field($model, 'newRepeatedPassword')->input('password') ?>
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Actualizarpassword -->

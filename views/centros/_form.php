<?php

use yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Security;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    
    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'mail')->input('email') ?>
    
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'rol_id')->dropDownList(
            ['1' => 'User', '2' => 'Admin', '3' => 'SuperAdmin']
    )
    ?>

    <?=
    $form->field($model, 'status')->dropDownList(
            ['0' => 'Desactivado', '10' => 'Activado']
    )
    ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
//use kartik\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\time\TimePicker;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\AgendasHorario */
/* @var $form ActiveForm */
?>


<div class="Actualizarhorario">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_lunes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_lunes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => true, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_martes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_martes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => true, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_miercoles')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_miercoles')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => true, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_jueves')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_jueves')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => true, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_viernes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_viernes')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => true, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_sabado')->widget(TimePicker::classname(), ['disabled' => true]); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_sabado')->widget(TimePicker::classname(), ['disabled' => true]); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => false, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'abertura_domingo')->widget(TimePicker::classname(), ['disabled' => true]); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cierre_domingo')->widget(TimePicker::classname(), ['disabled' => true]); ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo '<label class="control-label">Laborable</label>';
            echo SwitchInput::widget(['name' => 'status_1', 'value' => false, 'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO'
            ]]);
            ?>
        </div>
    </div>

    <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div><!-- Actualizarhorario -->

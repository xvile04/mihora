<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\time\TimePicker;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\AgendasHorario */
/* @var $form ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/actualizarhorario.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$horarios = ['manana', 'tarde'];
$semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
?>


<div class="Actualizarhorario">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($semana as $dia): ?>

        <?php foreach ($horarios as $horario): ?>
            <div class="row">
                <div class="col-lg-2">
                    <?php
                    echo $form->field($model, $dia . '_' . $horario)->widget(SwitchInput::classname(), [
                        'type' => SwitchInput::CHECKBOX,
                        'pluginEvents' => [
                            'switchChange.bootstrapSwitch' => 'function(event, state) {switchTime(state,"' . $horario . '_' . $dia . '");}',
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?=
                    $form->field($model, 'abertura_' . $horario . '_' . $dia)->widget(TimePicker::classname(), ['pluginOptions' => [
                            'showMeridian' => false,
                            'minuteStep' => 15,
                    ]]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?=
                    $form->field($model, 'cierre_' . $horario . '_' . $dia)->widget(TimePicker::classname(), ['pluginOptions' => [
                            'showMeridian' => false,
                            'minuteStep' => 15,]]);
                    ?>
                </div>

            </div>

        <?php endforeach ?>

        <?php endforeach ?>

    <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div><!-- Actualizarhorario -->


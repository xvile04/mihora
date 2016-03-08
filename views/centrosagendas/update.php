<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAgendas */

$this->title = 'Update Usuarios Agendas: ' . ' ' . $model->id_agenda;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Agendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agenda, 'url' => ['view', 'id' => $model->id_agenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-agendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

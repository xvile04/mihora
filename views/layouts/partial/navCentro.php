<?php

use app\models\CentrosAgendas;
use app\models\Empleados;
use yii\bootstrap\Nav;
use yii\helpers\Url;

$agenda = CentrosAgendas::getAgendaByIdUser(Yii::$app->user->identity->id);
$empleados = Empleados::getEmpleadosByIdCentro(Yii::$app->user->identity->id);
$items = [];

$items[] = ['label' => 'Agenda del Centro', 'url' => ['/main/index']];
$items[] = '<li class="divider"></li>';
$items[] = '<li class="dropdown-header">Agendas empleados</li>';
foreach($empleados as $empleado){
    $items[] = ['label' => $empleado->username, 'url' => Url::to(['main/index', 'id' => $empleado->id_empleado])];
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        [
            'label' => 'Agendas',
            'items' => $items
        ],
        [
            'label' => 'Empleados del Centro',
            'url' => ['/empleados/index'],
        ],
        [
            'label' => 'Datos del Centro',
            'items' => [
                ['label' => 'Datos Básicos', 'url' => ['/centrosinformacion/view']],
                ['label' => 'Actualizar Contraseña', 'url' => ['/centrosinformacion/actualizarpassword']],
            ],
        ],
        [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ],
    ],
]);

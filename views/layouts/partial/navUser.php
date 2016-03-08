<?php

use app\models\EmpleadosAgendas;
use yii\bootstrap\Nav;
use yii\helpers\Url;

$agenda = EmpleadosAgendas::getAgendaByIdUser(Yii::$app->user->identity->id);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Ver Agenda', 'url' => ['/main/index']],                
        [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ],
    ],
]);

<?php

use yii\bootstrap\Nav;

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        [
            'label' => 'Administración',
            'items' => [
                '<li class="dropdown-header">Admin Centros</li>',
                ['label' => 'Centros', 'url' => ['/centros/index']],
                ['label' => 'Nuevo Usuario', 'url' => ['/centros/create']],
                ['label' => 'Información Centros', 'url' => ['/centrosinformacion/index']],
                ['label' => 'Nueva Información Centros', 'url' => ['/centrosinformacion/create']],
                '<li class="divider"></li>',
                '<li class="dropdown-header">Admin Roles</li>',
                ['label' => 'Roles', 'url' => ['/rol/index']],
                ['label' => 'Nuevo Rol', 'url' => ['/rol/create']],
                '<li class="divider"></li>',
                '<li class="dropdown-header">Admin Permisos</li>',
                ['label' => 'Permisos', 'url' => ['/operacion/index']],
                ['label' => 'Nuevo Permiso', 'url' => ['/operacion/create']],
            ],
        ],
        [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ],
    ],
]);

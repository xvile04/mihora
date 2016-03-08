<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Centros;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosInformacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-informacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (Yii::$app->user->identity->rol_id === Centros::ROLE_ADMIN) {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'direccion',
        ],
    ])
    ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Empleados */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empleados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_empleado',
            //'id_centro',
            'username',
            'name',
            'direccion',
            'telefono',
            'mail',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{horario}',
                'buttons' => [
                    'horario' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-calendar"></span>', $url, [
                                    'title' => Yii::t('yii', 'Horario'),
                        ]);
                    }
                        ]],
            ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

</div>

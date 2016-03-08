<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados_horarios".
 *
 * @property integer $id_empleado
 * @property integer $lunes_manana
 * @property integer $lunes_tarde
 * @property integer $martes_manana
 * @property integer $martes_tarde
 * @property integer $miercoles_manana
 * @property integer $miercoles_tarde
 * @property integer $jueves_manana
 * @property integer $jueves_tarde
 * @property integer $viernes_manana
 * @property integer $viernes_tarde
 * @property integer $sabado_manana
 * @property integer $sabado_tarde
 * @property integer $domingo_manana
 * @property integer $domingo_tarde
 * @property string $abertura_manana_lunes
 * @property string $cierre_manana_lunes
 * @property string $abertura_tarde_lunes
 * @property string $cierre_tarde_lunes
 * @property string $abertura_manana_martes
 * @property string $cierre_manana_martes
 * @property string $abertura_tarde_martes
 * @property string $cierre_tarde_martes
 * @property string $abertura_manana_miercoles
 * @property string $cierre_manana_miercoles
 * @property string $abertura_tarde_miercoles
 * @property string $cierre_tarde_miercoles
 * @property string $abertura_manana_jueves
 * @property string $cierre_manana_jueves
 * @property string $abertura_tarde_jueves
 * @property string $cierre_tarde_jueves
 * @property string $abertura_manana_viernes
 * @property string $cierre_manana_viernes
 * @property string $abertura_tarde_viernes
 * @property string $cierre_tarde_viernes
 * @property string $abertura_manana_sabado
 * @property string $cierre_manana_sabado
 * @property string $abertura_tarde_sabado
 * @property string $cierre_tarde_sabado
 * @property string $abertura_manana_domingo
 * @property string $cierre_manana_domingo
 * @property string $abertura_tarde_domingo
 * @property string $cierre_tarde_domingo
 */
class EmpleadosHorarios extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'empleados_horarios';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['lunes_manana', 'lunes_tarde', 'martes_manana', 'martes_tarde', 'miercoles_manana', 'miercoles_tarde', 'jueves_manana', 'jueves_tarde', 'viernes_manana', 'viernes_tarde', 'sabado_manana', 'sabado_tarde', 'domingo_manana', 'domingo_tarde'], 'integer'],
            [['abertura_manana_lunes', 'cierre_manana_lunes', 'abertura_tarde_lunes', 'cierre_tarde_lunes', 'abertura_manana_martes', 'cierre_manana_martes', 'abertura_tarde_martes', 'cierre_tarde_martes', 'abertura_manana_miercoles', 'cierre_manana_miercoles', 'abertura_tarde_miercoles', 'cierre_tarde_miercoles', 'abertura_manana_jueves', 'cierre_manana_jueves', 'abertura_tarde_jueves', 'cierre_tarde_jueves', 'abertura_manana_viernes', 'cierre_manana_viernes', 'abertura_tarde_viernes', 'cierre_tarde_viernes', 'abertura_manana_sabado', 'cierre_manana_sabado', 'abertura_tarde_sabado', 'cierre_tarde_sabado', 'abertura_manana_domingo', 'cierre_manana_domingo', 'abertura_tarde_domingo', 'cierre_tarde_domingo'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_empleado' => 'Id Empleado',
            'lunes_manana' => 'Lunes Manana',
            'lunes_tarde' => 'Lunes Tarde',
            'martes_manana' => 'Martes Manana',
            'martes_tarde' => 'Martes Tarde',
            'miercoles_manana' => 'Miercoles Manana',
            'miercoles_tarde' => 'Miercoles Tarde',
            'jueves_manana' => 'Jueves Manana',
            'jueves_tarde' => 'Jueves Tarde',
            'viernes_manana' => 'Viernes Manana',
            'viernes_tarde' => 'Viernes Tarde',
            'sabado_manana' => 'Sabado Manana',
            'sabado_tarde' => 'Sabado Tarde',
            'domingo_manana' => 'Domingo Manana',
            'domingo_tarde' => 'Domingo Tarde',
            'abertura_manana_lunes' => 'Abertura Manana Lunes',
            'cierre_manana_lunes' => 'Cierre Manana Lunes',
            'abertura_tarde_lunes' => 'Abertura Tarde Lunes',
            'cierre_tarde_lunes' => 'Cierre Tarde Lunes',
            'abertura_manana_martes' => 'Abertura Manana Martes',
            'cierre_manana_martes' => 'Cierre Manana Martes',
            'abertura_tarde_martes' => 'Abertura Tarde Martes',
            'cierre_tarde_martes' => 'Cierre Tarde Martes',
            'abertura_manana_miercoles' => 'Abertura Manana Miercoles',
            'cierre_manana_miercoles' => 'Cierre Manana Miercoles',
            'abertura_tarde_miercoles' => 'Abertura Tarde Miercoles',
            'cierre_tarde_miercoles' => 'Cierre Tarde Miercoles',
            'abertura_manana_jueves' => 'Abertura Manana Jueves',
            'cierre_manana_jueves' => 'Cierre Manana Jueves',
            'abertura_tarde_jueves' => 'Abertura Tarde Jueves',
            'cierre_tarde_jueves' => 'Cierre Tarde Jueves',
            'abertura_manana_viernes' => 'Abertura Manana Viernes',
            'cierre_manana_viernes' => 'Cierre Manana Viernes',
            'abertura_tarde_viernes' => 'Abertura Tarde Viernes',
            'cierre_tarde_viernes' => 'Cierre Tarde Viernes',
            'abertura_manana_sabado' => 'Abertura Manana Sabado',
            'cierre_manana_sabado' => 'Cierre Manana Sabado',
            'abertura_tarde_sabado' => 'Abertura Tarde Sabado',
            'cierre_tarde_sabado' => 'Cierre Tarde Sabado',
            'abertura_manana_domingo' => 'Abertura Manana Domingo',
            'cierre_manana_domingo' => 'Cierre Manana Domingo',
            'abertura_tarde_domingo' => 'Abertura Tarde Domingo',
            'cierre_tarde_domingo' => 'Cierre Tarde Domingo',
        ];
    }

    public static function createHorario($id) {
        $model = new EmpleadosHorarios();
        $model->id_empleado = $id;
        $model->save();
    }

    public static function findHorarioByIdEmpleado($id) {
        return self::find()->where(['id_empleado' => $id])->one();
    }

    public static function getBusinessHours($id) {
        $semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $horarios = ['manana', 'tarde'];

        $model = self::findHorarioByIdEmpleado($id);
        $businesHours = [];

        $diaNum = 0;
        foreach ($semana as $dia) {
            $diaNum++;
            if($diaNum == 8) $diaNum = 0;
            foreach ($horarios as $horario) {
                $diahorario = $dia.'_'.$horario;
                $abertura = 'abertura_'. $horario .'_'.$dia;
                $cierre = 'cierre_'. $horario .'_'.$dia;
                if ($model->$diahorario == 1) {
                    $businesHours [] = ['start' => $model->$abertura,
                        'end' => $model->$cierre,
                        'dow' => [$diaNum]];
                }
            }
        }

        return $businesHours;
    }

}

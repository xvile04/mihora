<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados_agendas".
 *
 * @property integer $id_agenda
 * @property integer $id_empleado
 * @property string $nombre
 */
class EmpleadosAgendas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleados_agendas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'nombre'], 'required'],
            [['id_empleado'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agenda' => 'Id Agenda',
            'id_empleado' => 'Id Empleado',
            'nombre' => 'Nombre',
        ];
    }
    
    public static function getAgendaByIdUser($id) {
        return self::find()->where(['id_empleado' => $id])->one();
    }
    
    public function createAgenda($idUser, $nameAgenda) {
        $model = new EmpleadosAgendas();
        $model->id_empleado = $idUser;
        $model->nombre = $nameAgenda;
        $model->save();
    }
}

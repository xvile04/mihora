<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property integer $id_empleado
 * @property integer $id_centro
 * @property string $username
 * @property string $name
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 */
class Empleados extends \yii\db\ActiveRecord
{
    public $horarios;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_centro', 'username','mail'], 'required'],
            [['id_centro'], 'integer'],
            [['username', 'name', 'direccion', 'telefono', 'mail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado' => 'Id Empleado',
            'id_centro' => 'Id Centro',
            'username' => 'Username',
            'name' => 'Name',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'mail' => 'Mail'
        ];
    }
    
    
    public static function getEmpleadosByIdCentro($id){
        return self::find()->where(['id_centro' => $id])->all();
    }
}

<?php

namespace app\models;

use Yii;
use app\models\CentrosInformacion;

/**
 * This is the model class for table "usuarios_informacion".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 */
class CentrosInformacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centros_informacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nombre', 'direccion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
        ];
    }
    
    public function createEmptyUserInformation($id) {
        $informacionUsuario = new CentrosInformacion();
        $informacionUsuario->id = $id;
        $informacionUsuario->save();
    }
}

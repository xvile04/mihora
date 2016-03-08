<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centros".
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 */
class Centros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'mail'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 60],
            [['direccion', 'telefono', 'mail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'mail' => 'Mail',
        ];
    }
}

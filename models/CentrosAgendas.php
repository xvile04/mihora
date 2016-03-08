<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_agendas".
 *
 * @property integer $id_agenda
 * @property integer $id_user
 * @property string $nombre
 */
class CentrosAgendas extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'centros_agendas';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_user', 'nombre'], 'required'],
            [['id_user'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_agenda' => 'Id Agenda',
            'id_user' => 'Id User',
            'nombre' => 'Nombre',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function getAgendaByIdUser($id) {
        return self::find()->where(['id_user' => $id])->one();
    }

    public function createAgenda($idUser, $nameAgenda) {
        $model = new CentrosAgendas();
        $model->id_user = $idUser;
        $model->nombre = $nameAgenda;
        $model->save();
    }

}

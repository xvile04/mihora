<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentas".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $rol_id
 * @property integer $status
 */
class Cuentas extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
    
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_SUPERUSER = 3;
    const ROLE_CENTRO = 4;
    
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public $roles = array(1,2,3);

    
    public $mail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['rol_id', 'status'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 60],
            [['mail'], 'string', 'max' => 60]
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
            'password' => 'Password',
            'rol_id' => 'Rol ID',
            'status' => 'Status',
            'mail' => 'Email',
        ];
    }
    
    
    public function getAuthKey() {
        throw new \yii\base\NotSupportedException;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        throw new \yii\base\NotSupportedException;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException;
    }

    public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password) {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function roleInArray($arr_role) {
        return in_array(Yii::$app->user->identity->role, $arr_role);
    }

    public static function isActive() {
        return Yii::$app->user->identity->status == self::STATUS_ACTIVE;
    }

    public function getRol() {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
    
}

<?php

namespace app\models;

use Yii;
use app\models\Rol;
use yii\base\Model;

class UpdatePassword extends Model {

    public $actualPassword;
    public $newPassword;
    public $newRepeatedPassword;


    public function rules()
    {
        return [
            // Application Name
            ['actualPassword', 'required'],
            ['actualPassword', 'string', 'max' => 255],
            
            ['newPassword', 'required'],
            ['newPassword', 'string', 'max' => 255],
            
            ['newRepeatedPassword', 'required'],
            ['newRepeatedPassword', 'string', 'max' => 255],

        ];
    }

     public function attributeLabels()
    {
        return [
            'actualPassword'          => 'Password actual',
            'newPassword' => 'Nuevo password',
            'newRepeatedPassword'  => 'Repetir password',
        ];
    }
    
    
    public function validatePasswords()
    {
        if(Yii::$app->getSecurity()->validatePassword($this->actualPassword,Yii::$app->user->identity->password)
            && $this->newPassword === $this->newRepeatedPassword){
            return true;
        }
        else{
            return false;
        }
    }

   

}

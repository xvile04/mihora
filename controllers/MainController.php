<?php

namespace app\controllers;

use Yii;
use app\models\EmpleadosAgendas;
use app\models\CentrosAgendas;
use app\models\Cuentas;
use app\models\EmpleadosHorarios;

class MainController extends BaseController {

    public function actionIndex() {
        
        $id = Yii::$app->request->get('id');
        
        if(isset($id)){
            $tipo = 'empleado';
            $agenda = EmpleadosAgendas::getAgendaByIdUser($id);
        }
        else{
            switch (Yii::$app->user->identity->rol_id){
                case Cuentas::ROLE_USER:
                    $tipo = 'empleado';
                    $agenda = EmpleadosAgendas::getAgendaByIdUser(Yii::$app->user->identity->id);
                    break;
                case Cuentas::ROLE_CENTRO:
                    $tipo = 'centro';
                    $agenda = CentrosAgendas::getAgendaByIdUser(Yii::$app->user->identity->id);
                    break;    
            }
        }
        
        return $this->render('index', ['agenda' => $agenda, 'tipo' => $tipo , 'id' => $id ]);
    }
    
    public function actionGetdatoscalendario(){
        $tipo = Yii::$app->request->post('tipo');
        $id = Yii::$app->request->post('id');
        switch ($tipo){
            case 'empleado':
                $businessHours = EmpleadosHorarios::getBusinessHours($id);
                break;
            case 'centro':
                break;
        }
        
        $json = json_encode(['businessHours'=>$businessHours]);
        
        echo $json;
    }

}

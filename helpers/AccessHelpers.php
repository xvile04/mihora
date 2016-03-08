<?php
namespace app\helpers;

use yii;


class AccessHelpers {

    public static function getAcceso($operacion)
    {
        $allController = explode("-", $operacion);
        $allController = $allController[0]."-all";
        
        $connection = \Yii::$app->db;
        $sql = "SELECT o.nombre
                FROM cuentas u
                JOIN rol r ON u.rol_id = r.id
                JOIN rol_operacion ro ON r.id = ro.rol_id
                JOIN operacion o ON ro.operacion_id = o.id
                WHERE (o.nombre =:operacion OR o.nombre =:all_controller)
                AND u.rol_id =:rol_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":operacion", $operacion);
        $command->bindValue(":all_controller", $allController);
        $command->bindValue(":rol_id", Yii::$app->user->identity->rol_id);
        $result = $command->queryOne();

        if ($result['nombre'] != null){
            return true;
        } else {
            return false;
        }
    }

}

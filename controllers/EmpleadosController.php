<?php

namespace app\controllers;

use Yii;
use app\models\Empleados;
use app\models\search\Empleados as EmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cuentas;
use app\models\EmpleadosAgendas;

use app\models\EmpleadosHorarios;
/**
 * EmpleadosController implements the CRUD actions for Empleados model.
 */
class EmpleadosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Empleados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->queryParams;
        if(!isset($queryParams['Empleados'])){
            $filtros = ['Empleados'=>['id_centro'=>Yii::$app->user->id]];
        }else{
            $filtros = $queryParams;
            $filtros['Empleados']['id_centro'] = Yii::$app->user->id;
        }
        
        $searchModel = new EmpleadosSearch();
        $dataProvider = $searchModel->search($filtros);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleados model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Empleados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelEmpleados = new Empleados();

        if ($modelEmpleados->load(Yii::$app->request->post())) {
            
            $modelEmpleados->username = Yii::$app->user->identity->username.'.'.$modelEmpleados->username;
            $modelEmpleados->id_centro = Yii::$app->user->id ;
            
            $modelCuenta = new Cuentas();
            $modelCuenta->username = $modelEmpleados->username;
            $modelCuenta->rol_id = Cuentas::ROLE_USER;
            $modelCuenta->status = Cuentas::STATUS_ACTIVE;
            $password = Yii::$app->getSecurity()->generateRandomString(10);
            $modelCuenta->password = Yii::$app->getSecurity()->generatePasswordHash($password);

            if($modelCuenta->save()){
                $modelEmpleados->id_empleado = $modelCuenta->id;
                $modelEmpleados->save();
                
                self::sendRegistrationMail($modelEmpleados, $password);
                EmpleadosAgendas::createAgenda($modelEmpleados->id_empleado, 'Agenda de ' . $modelEmpleados->username);
                EmpleadosHorarios::createHorario($modelEmpleados->id_empleado);
                
                return $this->redirect(['view', 'id' => $modelEmpleados->id_empleado]);  
                
            }
            else{
                $this->refresh();
            }            
        } else {
            return $this->render('create', [
                'model' => $modelEmpleados,
            ]);
        }
    }

    /**
     * Updates an existing Empleados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empleado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empleados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    /**
     * Updates an existing Empleados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionHorario($id)
    {
        $model = EmpleadosHorarios::findHorarioByIdEmpleado($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('actualizarhorario', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Empleados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleados::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    private function sendRegistrationMail($model, $password) {

        $content = "<p> usuario: " . $model->username . "</p>";
        $content .= "<p> password: " . $password . "</p>";

        Yii::$app->mailer->compose("@app/mail/layouts/html.php", ["content" => $content])
                ->setTo($model->mail)
                ->setFrom(['vilellamunoz@gmail.com' => 'xavier vilella'])
                ->setSubject('usuario registrado')
                ->send();
    }
}

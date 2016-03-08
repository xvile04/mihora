<?php

namespace app\controllers;

use Yii;
use app\models\CentrosInformacion;
use app\models\search\CentrosInformacion as CentrosInformacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Centros;
use app\models\UpdatePassword;

/**
 * UsuariosInformacionController implements the CRUD actions for UsuariosInformacion model.
 */
class CentrosinformacionController extends BaseController
{
    
    /**
     * Lists all UsuariosInformacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CentrosInformacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuariosInformacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = null)
    {
        if(!isset($id)){
            $id = Yii::$app->user->identity->id;            
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UsuariosInformacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CentrosInformacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuariosInformacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id = null)
    {
        if(!isset($id)){
            $id = Yii::$app->user->identity->id;            
        }
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
   

    /**
     * Deletes an existing UsuariosInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    
    public function actionActualizarpassword(){
        $model = new UpdatePassword();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->validatePasswords()) {
                
                $userModel = Centros::findIdentity(Yii::$app->user->identity->id);
                $userModel->password = Yii::$app->getSecurity()->generatePasswordHash($model->newPassword);
                $userModel->save();
                
                return $this->redirect(['main/index']);
            }
        }

        return $this->render('actualizarpassword', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the UsuariosInformacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsuariosInformacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CentrosInformacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
}

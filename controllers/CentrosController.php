<?php

namespace app\controllers;

use Yii;
use app\models\Centros;
use app\models\search\CentrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CentrosInformacion;
use app\models\CentrosAgendas;
use app\models\Cuentas;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class CentrosController extends Controller {

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CentrosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $modelCuenta = new Cuentas();

        if ($modelCuenta->load(Yii::$app->request->post())) {

            $password = Yii::$app->getSecurity()->generateRandomString(10);
            $modelCuenta->password = Yii::$app->getSecurity()->generatePasswordHash($password);

            if ($modelCuenta->save()) {
                $modelCentros = new Centros;
                $modelCentros->id = $modelCuenta->id;
                $modelCentros->username = $modelCuenta->username;
                $modelCentros->mail = $modelCuenta->mail;
                
                if ($modelCentros->save()) {
                    self::sendRegistrationMail($modelCentros, $password);
                    CentrosInformacion::createEmptyUserInformation($modelCentros->id);
                    CentrosAgendas::createAgenda($modelCentros->id, 'Agenda de ' . $modelCentros->username);

                    return $this->redirect(['view', 'id' => $modelCentros->id]);
                }
            }
            else {
                return $this->refresh();
            }
        } else {
            return $this->render('create', [
                        'model' => $modelCuenta,
            ]);
        }
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Centros::findOne($id)) !== null) {
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

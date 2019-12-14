<?php

namespace backend\controllers;

use common\models\EntClientes;
use Yii;
use common\models\EntMediosContactos;
use common\models\EntMediosContactosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MediosContactosController implements the CRUD actions for EntMediosContactos model.
 */
class MediosContactosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EntMediosContactos models.
     * @return mixed
     */
    public function actionIndex()
    {
         $modelData = EntMediosContactos::getListAll();

        return $this->render('index',[
            'modelData'=>$modelData
        ]);
    }

    /**
     * Displays a single EntMediosContactos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($uuid)
    {
        return $this->render('view', [
            'model' => $this->findModel($uuid),
        ]);
    }

    /**
     * Creates a new EntMediosContactos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($uuidCliente)
    {

        $cliente = EntClientes::getByUuid($uuidCliente);

        $model = new EntMediosContactos();
        $model->uuid = uniqid("EntMediosContactos_");
        $model->b_habilitado = 1;
        $model->id_cliente = $cliente->id_cliente;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'uuid' => $model->uuid]);
            //return $this->redirect(['index']);
            return $this->redirect(['expediente/index' , 'uuid'=>$uuidCliente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EntMediosContactos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_medio_contacto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EntMediosContactos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($uuid)
    {
        $this->findModel($uuid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntMediosContactos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EntMediosContactos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uuid)
    {
        $model = EntMediosContactos::getByUuid($uuid);
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}

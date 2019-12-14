<?php

namespace backend\controllers;

use common\models\EntClientes;
use Yii;
use common\models\EntDirecciones;
use common\models\EntDireccionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DireccionesController implements the CRUD actions for EntDirecciones model.
 */
class DireccionesController extends Controller
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
     * Lists all EntDirecciones models.
     * @return mixed
     */
    public function actionIndex()
    {
         $modelData = EntDirecciones::getListAll();

        return $this->render('index',[
            'modelData'=>$modelData
        ]);
    }

    /**
     * Displays a single EntDirecciones model.
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
     * Creates a new EntDirecciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($uuidCliente)
    {
        $cliente = EntClientes::getByUuid($uuidCliente);

        $model = new EntDirecciones();
        $model->uuid = uniqid("EntDirecciones_");
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
     * Updates an existing EntDirecciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_]);
            return $this->redirect(['expediente/index' , 'uuid'=>$model->cliente->uuid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EntDirecciones model.
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
     * Finds the EntDirecciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EntDirecciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uuid)
    {
        $model = EntDirecciones::getByUuid($uuid);
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}

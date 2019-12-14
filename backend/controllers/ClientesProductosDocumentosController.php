<?php

namespace backend\controllers;

use Yii;
use common\models\RelClientesProductosDocumentos;
use common\models\RelClientesProductosDocumentosSearch;
use common\models\WrkClientesProductos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ClientesProductosDocumentosController implements the CRUD actions for RelClientesProductosDocumentos model.
 */
class ClientesProductosDocumentosController extends Controller
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
     * Lists all RelClientesProductosDocumentos models.
     * @return mixed
     */
    public function actionIndex()
    {
         $modelData = RelClientesProductosDocumentos::getListAll();

        return $this->render('index',[
            'modelData'=>$modelData
        ]);
    }

    /**
     * Displays a single RelClientesProductosDocumentos model.
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
     * Creates a new RelClientesProductosDocumentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($uuidProducto)
    {

        $productoCliente = WrkClientesProductos::getByUuid($uuidProducto);
        $model = new RelClientesProductosDocumentos();
        $model->uuid = uniqid("doc_");
        $model->b_habilitado = 1;
        $model->id_cliente_producto = $productoCliente->id_cliente_producto;
        //$model->txt_extension = 'pdf';

        if ($model->load(Yii::$app->request->post()) ) {
            $model->documentFile = UploadedFile::getInstance($model,'documentFile');
            $model->txt_extension = $model->documentFile->extension;
            if($model->save() && $model->upload()  ){
                return $this->redirect(['clientes-productos/view','uuid'=>$productoCliente->uuid]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RelClientesProductosDocumentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cliente_producto_documento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    public function actionDownload($uuid)
    {
        $model = $this->findModel($uuid);
        $usuario = $model->clienteProducto->cliente;
        $documentName = $model->tipoDocumentos->txt_nombre . "-" . $usuario->getNombreCompleto() . "." . $model->txt_extension;

        $path = Yii::getAlias('@webroot'.'/content/download/' . $usuario->uuid . '/' . $model->uuid . '.' . $model->txt_extension);

        if(file_exists($path)){
            return Yii::$app->response->sendFile($path, $documentName);
        }
    }

    /**
     * Deletes an existing RelClientesProductosDocumentos model.
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
     * Finds the RelClientesProductosDocumentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RelClientesProductosDocumentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uuid)
    {
        $model = RelClientesProductosDocumentos::getByUuid($uuid);
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}

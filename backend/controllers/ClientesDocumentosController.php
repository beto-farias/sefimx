<?php

namespace backend\controllers;

use common\models\EntClientes;
use Yii;
use common\models\RelClientesDocumentos;
use common\models\RelClientesDocumentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ClientesDocumentosController implements the CRUD actions for RelClientesDocumentos model.
 */
class ClientesDocumentosController extends Controller
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
     * Lists all RelClientesDocumentos models.
     * @return mixed
     */
    public function actionIndex()
    {
         $modelData = RelClientesDocumentos::getListAll();

        return $this->render('index',[
            'modelData'=>$modelData
        ]);
    }

    /**
     * Displays a single RelClientesDocumentos model.
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
     * Creates a new RelClientesDocumentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($uuidCliente)
    {
        $cliente = EntClientes::getByUuid($uuidCliente);
        $model = new RelClientesDocumentos();
        $model->uuid = uniqid("cliente_doc_");
        $model->b_habilitado = 1;
        $model->id_cliente = $cliente->id_cliente;


        if ($model->load(Yii::$app->request->post()) ) {
            $model->documentFile = UploadedFile::getInstance($model,'documentFile');
            $model->txt_extension = $model->documentFile->extension;
            if($model->save() && $model->upload()  ){
                return $this->redirect(['expediente/index','uuid'=>$cliente->uuid]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionDownload($uuid)
    {
        $model = $this->findModel($uuid);
        $usuario = $model->cliente;
        $documentName = $model->tipoDocumentos->txt_nombre . "-" . $usuario->getNombreCompleto() . "." . $model->txt_extension;

        $path = Yii::getAlias('@webroot'.'/content/download/' . $usuario->uuid . '/' . $model->uuid . '.' . $model->txt_extension);

        if(file_exists($path)){
            return Yii::$app->response->sendFile($path, $documentName);
        }
    }

    /**
     * Updates an existing RelClientesDocumentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cliente_documento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RelClientesDocumentos model.
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
     * Finds the RelClientesDocumentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RelClientesDocumentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uuid)
    {
        $model = RelClientesDocumentos::getByUuid($uuid);
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}

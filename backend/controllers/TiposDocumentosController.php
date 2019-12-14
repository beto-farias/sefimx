<?php

namespace backend\controllers;

use Yii;
use common\models\CatTiposDocumentos;
use common\models\CatTiposDocumentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiposDocumentosController implements the CRUD actions for CatTiposDocumentos model.
 */
class TiposDocumentosController extends Controller
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
     * Lists all CatTiposDocumentos models.
     * @return mixed
     */
    public function actionIndex()
    {
         $modelData = CatTiposDocumentos::getListAll();

        return $this->render('index',[
            'modelData'=>$modelData
        ]);
    }

    /**
     * Displays a single CatTiposDocumentos model.
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
     * Creates a new CatTiposDocumentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatTiposDocumentos();
        $model->uuid = uniqid("CatTiposDocumentos_");
        $model->b_habilitado = 1;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'uuid' => $model->uuid]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatTiposDocumentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tipo_documentos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatTiposDocumentos model.
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
     * Finds the CatTiposDocumentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatTiposDocumentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uuid)
    {
        $model = CatTiposDocumentos::getByUuid($uuid);
        if($model === null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}

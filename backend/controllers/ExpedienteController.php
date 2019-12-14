<?php

namespace backend\controllers;

use Yii;
use common\models\EntClientes;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ClientesController implements the CRUD actions for EntClientes model.
 */
class ExpedienteController extends Controller
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


    public function actionIndex($uuid){
        $model = EntClientes::getByUuid($uuid);

        return $this->render('index',['model'=>$model]);
    }

}

?>
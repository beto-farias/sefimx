<?php

namespace common\models;

use Yii;
use backend\dGomUtils\Calendario;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This class is the extended object from 2Gom
 * This is the model class for table "rel_clientes_productos_documentos".
 *
 * @property int $id_cliente_producto_documento
 * @property string $uuid
 * @property int $id_cliente_producto
 * @property int $id_tipo_documentos
 * @property string|null $txt_notas
 * @property string|null $fch_vencimiento
 * @property int $b_descargable Indica si un cliente puede descargar el documento
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatTiposDocumentos $tipoDocumentos
 * @property WrkClientesProductos $clienteProducto
 */
class RelClientesProductosDocumentos extends RelClientesProductosDocumentosBase
{


    public $documentFile;

    public function attributeLabels()
    {
        $res = parent::attributeLabels();
        $res['id_tipo_documentos'] = 'Tipo de documento';
        $res['txt_notas'] = 'Notas';
        $res['fch_vencimiento'] = 'Fecha de vencimiento';
        $res['b_descargable'] = 'Descargable por cliente';
       
        return $res;
    }

    public function rules(){
        $rules = parent::rules();
        $rules[] = [['documentFile'], 'file','skipOnEmpty'=>false, 'extensions'=>'pdf'];
        return $rules;
    }


    public function upload(){
        if($this->validate()){
            
            $path = Yii::getAlias('@webroot'.'/content/download/' . $this->clienteProducto->cliente->uuid . "/");
            $filePath = $path . $this->uuid . '.' . $this->documentFile->extension;
            if(!file_exists($path)){
                mkdir($path,true);
            }
            $this->documentFile->saveAs($filePath);
    
            return true;
        }
        return false;
    }

    /**
     * Método para recuperar el objeto por UUID
     */
    public static function getByUuid($uuid){
        $res = self::find()->where(['uuid'=>$uuid])->one();
        return $res;
    }

    /**
     * Método para recuperar el objeto por ID
     */
    public static function getById($id){
        $res = self::find()->where(['id'=>$id])->one();
        return $res;
    }


    /**
     * Método para recuperar la lista paginada
     */
    public static function getListPage($page = 1,$pageSize = 100){
        $offset = ($page -1) * $pageSize;

        $res = self::find()
        ->where(['b_habilitado'=>1])
        ->limit($pageSize)
        ->offset($offset)
        ->all();
        return $res;
    }

    /**
     * Método para recuperar la lista completa
     */
    public static function getListAll(){
        $res = self::find()
        ->where(['b_habilitado'=>1])
        ->all();
        return $res;
    }

    /**
     * Método que recupera un catalogo como ArrayHelper
     */
    public static function getArrayDropDown(){
        $res = ArrayHelper::map(RelClientesProductosDocumentos::find()->all(), 'id', 'txt_nombre');
        return $res;
    }

    /*
     * Metodo para asignar la informacion de creacion y update
     */
    public function beforeValidate(){
        if ($this->isNewRecord) {
            $date =  Calendario::getActualTimestamp();
            $this->create_usr = \Yii::$app->user->identity->username;
            $this->create_date = $date;
            $this->update_usr = \Yii::$app->user->identity->username;
            $this->update_date = $date;
        }
        else {
            $this->update_usr = \Yii::$app->user->identity->username;
            $this->update_date = Calendario::getActualTimestamp();
        }
        return parent::beforeValidate();
    }
}

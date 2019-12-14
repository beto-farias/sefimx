<?php

namespace common\models;

use Yii;
use backend\dGomUtils\Calendario;
use yii\helpers\ArrayHelper;

/**
 * This class is the extended object from 2Gom
 * This is the model class for table "wrk_clientes_productos".
 *
 * @property int $id_cliente_producto
 * @property string $uuid
 * @property int $id_cliente
 * @property int $id_producto
 * @property int|null $id_cliente_producto_padre Relacion entre productos padres e hijos, como renovaciones
 * @property string $txt_folio
 * @property string|null $txt_notas
 * @property string $fch_contratacion
 * @property string|null $fch_renovacion
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property RelClientesProductosDocumentos[] $relClientesProductosDocumentos
 * @property CatProductos $producto
 * @property EntClientes $cliente
 */
class WrkClientesProductos extends WrkClientesProductosBase
{

    public function attributeLabels()
    {
        $res = parent::attributeLabels();
        $res['id_cliente_producto_padre'] = 'Endoso de';
        $res['txt_folio'] = 'Número de póliza';
        $res['txt_notas'] = 'Notas';
        $res['fch_contratacion'] = 'Fecha de inicio de vigencia';
        $res['fch_renovacion'] = 'Fecha de renovación';
        return $res;
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
        $res = ArrayHelper::map(WrkClientesProductos::find()->all(), 'id', 'txt_nombre');
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

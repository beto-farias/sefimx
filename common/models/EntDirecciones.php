<?php

namespace common\models;

use backend\dGomUtils\Calendario;
use Yii;

/**
 * This class is the extended object from 2Gom
 * This is the model class for table "ent_direcciones".
 *
 * @property int $id_
 * @property string $uuid
 * @property int $id_cliente
 * @property string $txt_calle
 * @property string $txt_numero_ext
 * @property string|null $txt_numero_int
 * @property string $txt_colonia
 * @property string $txt_municipio
 * @property string $txt_estado
 * @property string $txt_ciudad
 * @property string $txt_cp
 * @property int $b_primaria
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 * @property string|null $ent_direccionescol
 *
 * @property EntClientes $cliente
 */
class EntDirecciones extends EntDireccionesBase
{

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

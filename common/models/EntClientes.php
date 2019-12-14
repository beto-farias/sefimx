<?php

namespace common\models;

use backend\dGomUtils\Calendario;
use Yii;
use yii\helpers\ArrayHelper;

/*
 * @property int $id_cliente
 * @property string $uuid
 * @property string|null $txt_nombre
 * @property string|null $txt_apellido_paterno
 * @property string|null $txt_apellido_materno
 * @property string|null $txt_rfc
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property EntDirecciones[] $entDirecciones
 * @property EntMediosContactos[] $entMediosContactos
 * @property EntVendedores[] $entVendedores
 * @property RelClientesClientes[] $relClientesClientes
 * @property RelClientesClientes[] $relClientesClientes0
 * @property RelClientesDocumentos[] $relClientesDocumentos
 * @property WrkClientesProductos[] $wrkClientesProductos
 */
class EntClientes extends EntClientesBase
{

    public function attributeLabels()
    {
        $res = parent::attributeLabels();

        $res['txt_nombre'] = "Nombre";
        $res['txt_apellido_paterno'] = "Apellido Paterno";
        $res['txt_apellido_materno'] = "Apellido Materno";
        $res['txt_rfc'] = "RFC";
        $res['fch_nacimiento'] = "Fecha de nacimiento";
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
        ->orderBy('txt_nombre ASC, txt_apellido_paterno ASC, txt_apellido_materno ASC')
        ->all();
        return $res;
    }

    /**
     * Método que recupera un catalogo como ArrayHelper
     */
    public static function getArrayDropDown(){
        $res = ArrayHelper::map(EntClientes::find()->all(), 'id_cliente', 'txt_nombre');
        return $res;
    }

    public function getNombreCompleto(){
        return $this->txt_nombre . " " . $this->txt_apellido_paterno . " " . $this->txt_apellido_materno;
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

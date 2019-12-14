<?php

namespace common\models;

use Yii;

/**
 * This class is the extended object from 2Gom
 * This is the model class for table "migration".
 *
 * @property string $version
 * @property int|null $apply_time
 */
class Migration extends _Migration{

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
     * Método para recuperar el objeto por ID
     */
    public static function getList($page = 1,$pageSize = 100){

        $res = self::find()
        ->where(['b_habilitado'=>1])
        
        ->all();
        return $res;
    }
}

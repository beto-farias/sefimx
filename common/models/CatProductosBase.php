<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_productos".
 *
 * @property int $id_producto
 * @property string $uuid
 * @property int $id_proveedor
 * @property int $id_tipo_producto
 * @property string $txt_clave_producto
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatProveedores $proveedor
 * @property CatTiposProductos $tipoProducto
 * @property WrkClientesProductos[] $wrkClientesProductos
 */
class CatProductosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_proveedor', 'id_tipo_producto', 'txt_clave_producto', 'txt_nombre', 'txt_descripcion', 'create_usr', 'b_habilitado'], 'required'],
            [['id_proveedor', 'id_tipo_producto', 'b_habilitado'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_clave_producto', 'txt_nombre'], 'string', 'max' => 45],
            [['txt_descripcion'], 'string', 'max' => 450],
            [['uuid'], 'unique'],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => CatProveedores::className(), 'targetAttribute' => ['id_proveedor' => 'id_proveedor']],
            [['id_tipo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposProductos::className(), 'targetAttribute' => ['id_tipo_producto' => 'id_tipo_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'uuid' => 'Uuid',
            'id_proveedor' => 'Id Proveedor',
            'id_tipo_producto' => 'Id Tipo Producto',
            'txt_clave_producto' => 'Txt Clave Producto',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'create_usr' => 'Create Usr',
            'create_date' => 'Create Date',
            'update_usr' => 'Update Usr',
            'update_date' => 'Update Date',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(CatProveedores::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoProducto()
    {
        return $this->hasOne(CatTiposProductos::className(), ['id_tipo_producto' => 'id_tipo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkClientesProductos()
    {
        return $this->hasMany(WrkClientesProductos::className(), ['id_producto' => 'id_producto']);
    }
}

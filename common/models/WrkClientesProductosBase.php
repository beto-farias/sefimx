<?php

namespace common\models;

use Yii;

/**
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
class WrkClientesProductosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wrk_clientes_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente', 'id_producto', 'txt_folio', 'fch_contratacion', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente', 'id_producto', 'id_cliente_producto_padre', 'b_habilitado'], 'integer'],
            [['fch_contratacion', 'fch_renovacion', 'create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_folio'], 'string', 'max' => 45],
            [['txt_notas'], 'string', 'max' => 450],
            [['uuid'], 'unique'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => CatProductos::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_producto' => 'Id Cliente Producto',
            'uuid' => 'Uuid',
            'id_cliente' => 'Id Cliente',
            'id_producto' => 'Id Producto',
            'id_cliente_producto_padre' => 'Id Cliente Producto Padre',
            'txt_folio' => 'Txt Folio',
            'txt_notas' => 'Txt Notas',
            'fch_contratacion' => 'Fch Contratacion',
            'fch_renovacion' => 'Fch Renovacion',
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
    public function getRelClientesProductosDocumentos()
    {
        return $this->hasMany(RelClientesProductosDocumentos::className(), ['id_cliente_producto' => 'id_cliente_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(CatProductos::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }
}

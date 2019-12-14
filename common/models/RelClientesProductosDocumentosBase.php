<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_clientes_productos_documentos".
 *
 * @property int $id_cliente_producto_documento
 * @property string $uuid
 * @property int $id_cliente_producto
 * @property int $id_tipo_documentos
 * @property string|null $txt_notas
 * @property string|null $fch_vencimiento
 * @property int $b_descargable Indica si un cliente puede descargar el documento
 * @property string $txt_extension
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatTiposDocumentos $tipoDocumentos
 * @property WrkClientesProductos $clienteProducto
 */
class RelClientesProductosDocumentosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_clientes_productos_documentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente_producto', 'id_tipo_documentos', 'txt_extension', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente_producto', 'id_tipo_documentos', 'b_descargable', 'b_habilitado'], 'integer'],
            [['fch_vencimiento', 'create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_notas'], 'string', 'max' => 450],
            [['txt_extension'], 'string', 'max' => 5],
            [['uuid'], 'unique'],
            [['id_tipo_documentos'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposDocumentos::className(), 'targetAttribute' => ['id_tipo_documentos' => 'id_tipo_documentos']],
            [['id_cliente_producto'], 'exist', 'skipOnError' => true, 'targetClass' => WrkClientesProductos::className(), 'targetAttribute' => ['id_cliente_producto' => 'id_cliente_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_producto_documento' => 'Id Cliente Producto Documento',
            'uuid' => 'Uuid',
            'id_cliente_producto' => 'Id Cliente Producto',
            'id_tipo_documentos' => 'Id Tipo Documentos',
            'txt_notas' => 'Txt Notas',
            'fch_vencimiento' => 'Fch Vencimiento',
            'b_descargable' => 'B Descargable',
            'txt_extension' => 'Txt Extension',
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
    public function getTipoDocumentos()
    {
        return $this->hasOne(CatTiposDocumentos::className(), ['id_tipo_documentos' => 'id_tipo_documentos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteProducto()
    {
        return $this->hasOne(WrkClientesProductos::className(), ['id_cliente_producto' => 'id_cliente_producto']);
    }
}

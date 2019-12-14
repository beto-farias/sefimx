<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_clientes_documentos".
 *
 * @property int $id_cliente_documento
 * @property string $uuid
 * @property int $id_cliente
 * @property int $id_tipo_documentos
 * @property string|null $txt_notas
 * @property string|null $fch_vencimiento
 * @property string $txt_extension
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatTiposDocumentos $tipoDocumentos
 * @property EntClientes $cliente
 */
class RelClientesDocumentosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_clientes_documentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente', 'id_tipo_documentos', 'txt_extension', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente', 'id_tipo_documentos', 'b_habilitado'], 'integer'],
            [['fch_vencimiento', 'create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_notas'], 'string', 'max' => 450],
            [['txt_extension'], 'string', 'max' => 5],
            [['uuid'], 'unique'],
            [['id_tipo_documentos'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposDocumentos::className(), 'targetAttribute' => ['id_tipo_documentos' => 'id_tipo_documentos']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_documento' => 'Id Cliente Documento',
            'uuid' => 'Uuid',
            'id_cliente' => 'Id Cliente',
            'id_tipo_documentos' => 'Id Tipo Documentos',
            'txt_notas' => 'Txt Notas',
            'fch_vencimiento' => 'Fch Vencimiento',
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
    public function getCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }
}

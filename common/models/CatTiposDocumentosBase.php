<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_documentos".
 *
 * @property int $id_tipo_documentos
 * @property string $uuid
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property int $b_documento_cliente
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property RelClientesDocumentos[] $relClientesDocumentos
 * @property RelClientesProductosDocumentos[] $relClientesProductosDocumentos
 */
class CatTiposDocumentosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_tipos_documentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'txt_nombre', 'txt_descripcion', 'b_documento_cliente', 'create_usr', 'b_habilitado'], 'required'],
            [['b_documento_cliente', 'b_habilitado'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_nombre'], 'string', 'max' => 45],
            [['txt_descripcion'], 'string', 'max' => 450],
            [['uuid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_documentos' => 'Id Tipo Documentos',
            'uuid' => 'Uuid',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_documento_cliente' => 'B Documento Cliente',
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
    public function getRelClientesDocumentos()
    {
        return $this->hasMany(RelClientesDocumentos::className(), ['id_tipo_documentos' => 'id_tipo_documentos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelClientesProductosDocumentos()
    {
        return $this->hasMany(RelClientesProductosDocumentos::className(), ['id_tipo_documentos' => 'id_tipo_documentos']);
    }
}

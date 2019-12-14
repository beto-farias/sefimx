<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ent_clientes".
 *
 * @property int $id_cliente
 * @property string $uuid
 * @property int $id_vendedor
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string|null $txt_apellido_materno
 * @property string $txt_rfc
 * @property string $fch_nacimiento
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property EntVendedores $vendedor
 * @property EntDirecciones[] $entDirecciones
 * @property EntMediosContactos[] $entMediosContactos
 * @property RelClientesClientes[] $relClientesClientes
 * @property RelClientesClientes[] $relClientesClientes0
 * @property RelClientesDocumentos[] $relClientesDocumentos
 * @property WrkClientesProductos[] $wrkClientesProductos
 */
class EntClientesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_vendedor', 'txt_nombre', 'txt_apellido_paterno', 'txt_rfc', 'fch_nacimiento', 'create_usr', 'b_habilitado'], 'required'],
            [['id_vendedor', 'b_habilitado'], 'integer'],
            [['fch_nacimiento', 'create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_rfc'], 'string', 'max' => 45],
            [['uuid'], 'unique'],
            [['id_vendedor'], 'exist', 'skipOnError' => true, 'targetClass' => EntVendedores::className(), 'targetAttribute' => ['id_vendedor' => 'id_vendedor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'uuid' => 'Uuid',
            'id_vendedor' => 'Id Vendedor',
            'txt_nombre' => 'Txt Nombre',
            'txt_apellido_paterno' => 'Txt Apellido Paterno',
            'txt_apellido_materno' => 'Txt Apellido Materno',
            'txt_rfc' => 'Txt Rfc',
            'fch_nacimiento' => 'Fch Nacimiento',
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
    public function getVendedor()
    {
        return $this->hasOne(EntVendedores::className(), ['id_vendedor' => 'id_vendedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDirecciones()
    {
        return $this->hasMany(EntDirecciones::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntMediosContactos()
    {
        return $this->hasMany(EntMediosContactos::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelClientesClientes()
    {
        return $this->hasMany(RelClientesClientes::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelClientesClientes0()
    {
        return $this->hasMany(RelClientesClientes::className(), ['id_cliente_relacion' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelClientesDocumentos()
    {
        return $this->hasMany(RelClientesDocumentos::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkClientesProductos()
    {
        return $this->hasMany(WrkClientesProductos::className(), ['id_cliente' => 'id_cliente']);
    }
}

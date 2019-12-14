<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ent_vendedores".
 *
 * @property int $id_vendedor
 * @property string $uuid
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $txt_correo
 * @property string $txt_telefono
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property EntClientes[] $entClientes
 */
class EntVendedoresBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_vendedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'txt_nombre', 'txt_descripcion', 'txt_correo', 'txt_telefono', 'create_usr', 'b_habilitado'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['b_habilitado'], 'integer'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_nombre', 'txt_correo', 'txt_telefono'], 'string', 'max' => 45],
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
            'id_vendedor' => 'Id Vendedor',
            'uuid' => 'Uuid',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'txt_correo' => 'Txt Correo',
            'txt_telefono' => 'Txt Telefono',
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
    public function getEntClientes()
    {
        return $this->hasMany(EntClientes::className(), ['id_vendedor' => 'id_vendedor']);
    }
}

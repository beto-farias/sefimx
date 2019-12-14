<?php

namespace common\models;

use Yii;

/**
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
class EntDireccionesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_direcciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente', 'txt_calle', 'txt_numero_ext', 'txt_colonia', 'txt_municipio', 'txt_estado', 'txt_ciudad', 'txt_cp', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente', 'b_primaria', 'b_habilitado'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_calle', 'txt_numero_ext', 'txt_numero_int', 'txt_colonia', 'txt_municipio', 'txt_estado', 'txt_ciudad', 'ent_direccionescol'], 'string', 'max' => 45],
            [['txt_cp'], 'string', 'max' => 5],
            [['uuid'], 'unique'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_' => 'Id',
            'uuid' => 'Uuid',
            'id_cliente' => 'Id Cliente',
            'txt_calle' => 'Txt Calle',
            'txt_numero_ext' => 'Txt Numero Ext',
            'txt_numero_int' => 'Txt Numero Int',
            'txt_colonia' => 'Txt Colonia',
            'txt_municipio' => 'Txt Municipio',
            'txt_estado' => 'Txt Estado',
            'txt_ciudad' => 'Txt Ciudad',
            'txt_cp' => 'Txt Cp',
            'b_primaria' => 'B Primaria',
            'create_usr' => 'Create Usr',
            'create_date' => 'Create Date',
            'update_usr' => 'Update Usr',
            'update_date' => 'Update Date',
            'b_habilitado' => 'B Habilitado',
            'ent_direccionescol' => 'Ent Direccionescol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }
}

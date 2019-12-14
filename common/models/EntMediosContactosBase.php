<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ent_medios_contactos".
 *
 * @property int $id_medio_contacto
 * @property string $uuid
 * @property int $id_cliente
 * @property int $id_tipo_medio_contacto
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatTiposMediosContatos $tipoMedioContacto
 * @property EntClientes $cliente
 */
class EntMediosContactosBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ent_medios_contactos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente', 'id_tipo_medio_contacto', 'txt_nombre', 'txt_descripcion', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente', 'id_tipo_medio_contacto', 'b_habilitado'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_nombre'], 'string', 'max' => 45],
            [['txt_descripcion'], 'string', 'max' => 450],
            [['uuid'], 'unique'],
            [['id_tipo_medio_contacto'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposMediosContatos::className(), 'targetAttribute' => ['id_tipo_medio_contacto' => 'id_tipo_medio_contacto']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_medio_contacto' => 'Id Medio Contacto',
            'uuid' => 'Uuid',
            'id_cliente' => 'Id Cliente',
            'id_tipo_medio_contacto' => 'Id Tipo Medio Contacto',
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
    public function getTipoMedioContacto()
    {
        return $this->hasOne(CatTiposMediosContatos::className(), ['id_tipo_medio_contacto' => 'id_tipo_medio_contacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_relaciones_clientes".
 *
 * @property int $id_tipo_relacion
 * @property string $uuid
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property RelClientesClientes[] $relClientesClientes
 */
class CatTiposRelacionesClientesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_tipos_relaciones_clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'txt_nombre', 'txt_descripcion', 'create_usr', 'b_habilitado'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['b_habilitado'], 'integer'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['txt_nombre', 'txt_descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_relacion' => 'Id Tipo Relacion',
            'uuid' => 'Uuid',
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
    public function getRelClientesClientes()
    {
        return $this->hasMany(RelClientesClientes::className(), ['id_tipo_relacion' => 'id_tipo_relacion']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_clientes_clientes".
 *
 * @property int $id_cliente_cliente
 * @property string $uuid
 * @property int $id_cliente
 * @property int $id_cliente_relacion
 * @property int $id_tipo_relacion
 * @property string $create_usr
 * @property string $create_date
 * @property string|null $update_usr
 * @property string|null $update_date
 * @property int $b_habilitado
 *
 * @property CatTiposRelacionesClientes $tipoRelacion
 * @property EntClientes $cliente
 * @property EntClientes $clienteRelacion
 */
class RelClientesClientesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_clientes_clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'id_cliente', 'id_cliente_relacion', 'id_tipo_relacion', 'create_usr', 'b_habilitado'], 'required'],
            [['id_cliente', 'id_cliente_relacion', 'id_tipo_relacion', 'b_habilitado'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uuid', 'create_usr', 'update_usr'], 'string', 'max' => 40],
            [['uuid'], 'unique'],
            [['id_tipo_relacion'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposRelacionesClientes::className(), 'targetAttribute' => ['id_tipo_relacion' => 'id_tipo_relacion']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_cliente_relacion'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente_relacion' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_cliente' => 'Id Cliente Cliente',
            'uuid' => 'Uuid',
            'id_cliente' => 'Id Cliente',
            'id_cliente_relacion' => 'Id Cliente Relacion',
            'id_tipo_relacion' => 'Id Tipo Relacion',
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
    public function getTipoRelacion()
    {
        return $this->hasOne(CatTiposRelacionesClientes::className(), ['id_tipo_relacion' => 'id_tipo_relacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteRelacion()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente_relacion']);
    }
}

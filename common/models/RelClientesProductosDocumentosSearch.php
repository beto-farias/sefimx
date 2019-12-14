<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RelClientesProductosDocumentos;

/**
 * RelClientesProductosDocumentosSearch represents the model behind the search form of `common\models\RelClientesProductosDocumentos`.
 */
class RelClientesProductosDocumentosSearch extends RelClientesProductosDocumentos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_producto_documento', 'id_cliente_producto', 'id_tipo_documentos', 'b_descargable', 'b_habilitado'], 'integer'],
            [['uuid', 'txt_notas', 'fch_vencimiento', 'create_usr', 'create_date', 'update_usr', 'update_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RelClientesProductosDocumentos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_cliente_producto_documento' => $this->id_cliente_producto_documento,
            'id_cliente_producto' => $this->id_cliente_producto,
            'id_tipo_documentos' => $this->id_tipo_documentos,
            'fch_vencimiento' => $this->fch_vencimiento,
            'b_descargable' => $this->b_descargable,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'txt_notas', $this->txt_notas])
            ->andFilterWhere(['like', 'create_usr', $this->create_usr])
            ->andFilterWhere(['like', 'update_usr', $this->update_usr]);

        return $dataProvider;
    }
}
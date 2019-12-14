<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RelClientesClientes;

/**
 * RelClientesClientesSearch represents the model behind the search form of `common\models\RelClientesClientes`.
 */
class RelClientesClientesSearch extends RelClientesClientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_cliente', 'id_cliente', 'id_cliente_relacion', 'id_tipo_relacion', 'b_habilitado'], 'integer'],
            [['uuid', 'create_usr', 'create_date', 'update_usr', 'update_date'], 'safe'],
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
        $query = RelClientesClientes::find();

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
            'id_cliente_cliente' => $this->id_cliente_cliente,
            'id_cliente' => $this->id_cliente,
            'id_cliente_relacion' => $this->id_cliente_relacion,
            'id_tipo_relacion' => $this->id_tipo_relacion,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'create_usr', $this->create_usr])
            ->andFilterWhere(['like', 'update_usr', $this->update_usr]);

        return $dataProvider;
    }
}

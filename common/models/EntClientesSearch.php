<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntClientes;

/**
 * EntClientesSearch represents the model behind the search form of `common\models\EntClientes`.
 */
class EntClientesSearch extends EntClientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'b_habilitado'], 'integer'],
            [['uuid', 'txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_rfc', 'create_usr', 'create_date', 'update_usr', 'update_date'], 'safe'],
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
        $query = EntClientes::find();

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
            'id_cliente' => $this->id_cliente,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
            ->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
            ->andFilterWhere(['like', 'txt_rfc', $this->txt_rfc])
            ->andFilterWhere(['like', 'create_usr', $this->create_usr])
            ->andFilterWhere(['like', 'update_usr', $this->update_usr]);

        return $dataProvider;
    }
}

<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntVendedores;

/**
 * EntVendedoresSearch represents the model behind the search form of `common\models\EntVendedores`.
 */
class EntVendedoresSearch extends EntVendedores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vendedor', 'b_habilitado'], 'integer'],
            [['uuid', 'txt_nombre', 'txt_descripcion', 'txt_correo', 'txt_telefono', 'create_usr', 'create_date', 'update_usr', 'update_date'], 'safe'],
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
        $query = EntVendedores::find();

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
            'id_vendedor' => $this->id_vendedor,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
            ->andFilterWhere(['like', 'txt_correo', $this->txt_correo])
            ->andFilterWhere(['like', 'txt_telefono', $this->txt_telefono])
            ->andFilterWhere(['like', 'create_usr', $this->create_usr])
            ->andFilterWhere(['like', 'update_usr', $this->update_usr]);

        return $dataProvider;
    }
}

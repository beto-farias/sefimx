<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EntDirecciones;

/**
 * EntDireccionesSearch represents the model behind the search form of `common\models\EntDirecciones`.
 */
class EntDireccionesSearch extends EntDirecciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_', 'id_cliente', 'b_primaria', 'b_habilitado'], 'integer'],
            [['uuid', 'txt_calle', 'txt_numero_ext', 'txt_numero_int', 'txt_colonia', 'txt_municipio', 'txt_estado', 'txt_ciudad', 'txt_cp', 'create_usr', 'create_date', 'update_usr', 'update_date', 'ent_direccionescol'], 'safe'],
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
        $query = EntDirecciones::find();

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
            'id_' => $this->id_,
            'id_cliente' => $this->id_cliente,
            'b_primaria' => $this->b_primaria,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'txt_calle', $this->txt_calle])
            ->andFilterWhere(['like', 'txt_numero_ext', $this->txt_numero_ext])
            ->andFilterWhere(['like', 'txt_numero_int', $this->txt_numero_int])
            ->andFilterWhere(['like', 'txt_colonia', $this->txt_colonia])
            ->andFilterWhere(['like', 'txt_municipio', $this->txt_municipio])
            ->andFilterWhere(['like', 'txt_estado', $this->txt_estado])
            ->andFilterWhere(['like', 'txt_ciudad', $this->txt_ciudad])
            ->andFilterWhere(['like', 'txt_cp', $this->txt_cp])
            ->andFilterWhere(['like', 'create_usr', $this->create_usr])
            ->andFilterWhere(['like', 'update_usr', $this->update_usr])
            ->andFilterWhere(['like', 'ent_direccionescol', $this->ent_direccionescol]);

        return $dataProvider;
    }
}

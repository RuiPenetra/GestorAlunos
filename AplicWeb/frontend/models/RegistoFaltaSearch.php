<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RegistoFalta;

/**
 * RegistoFaltaSearch represents the model behind the search form of `backend\models\RegistoFalta`.
 */
class RegistoFaltaSearch extends RegistoFalta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_horas', 'id_perfil', 'id_tipo'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
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
        $query = RegistoFalta::find();

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
            'id' => $this->id,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'num_horas' => $this->num_horas,
            'id_perfil' => $this->id_perfil,
            'id_tipo' => $this->id_tipo,
        ]);

        return $dataProvider;
    }
}

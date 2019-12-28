<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Aula;

/**
 * AulaSearch represents the model behind the search form of `backend\models\Aula`.
 */
class AulaSearch extends Aula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_turno', 'id_professor', 'horario_id'], 'integer'],
            [['nome', 'inicio', 'fim', 'sala', 'dia'], 'safe'],
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
        $query = Aula::find();

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
            'inicio' => $this->inicio,
            'fim' => $this->fim,
            'id_turno' => $this->id_turno,
            'id_professor' => $this->id_professor,
            'horario_id' => $this->horario_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sala', $this->sala])
            ->andFilterWhere(['like', 'dia', $this->dia]);

        return $dataProvider;
    }
}

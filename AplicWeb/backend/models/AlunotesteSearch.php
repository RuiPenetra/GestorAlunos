<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AlunoTeste;

/**
 * AlunotesteSearch represents the model behind the search form of `frontend\models\AlunoTeste`.
 */
class AlunotesteSearch extends AlunoTeste
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id_perfil', 'teste_id', 'nota'], 'integer'],
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
        $query = AlunoTeste::find();

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
            'aluno_id_perfil' => $this->aluno_id_perfil,
            'teste_id' => $this->teste_id,
            'nota' => $this->nota,
        ]);

        return $dataProvider;
    }
}

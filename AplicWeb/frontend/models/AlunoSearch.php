<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form of `backend\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perfil', 'id_curso'], 'integer'],
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
        $query = Aluno::find();
        $query->joinWith(['perfil']);

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
            'id_perfil' => $this->id_perfil,
            'id_curso' => $this->id_curso,
            'perfil.nome' => $this->id_perfil,
        ]);

        return $dataProvider;
    }
}

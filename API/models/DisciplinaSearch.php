<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Disciplina;

/**
 * DisciplinaSearch represents the model behind the search form of `backend\models\Disciplina`.
 */
class DisciplinaSearch extends Disciplina
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'semestre', 'id_professor', 'curso_id'], 'integer'],
            [['nome', 'abreviatura'], 'safe'],
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
        $query = Disciplina::find();

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
            'semestre' => $this->semestre,
            'id_professor' => $this->id_professor,
            'curso_id' => $this->curso_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'abreviatura', $this->abreviatura]);

        return $dataProvider;
    }
}

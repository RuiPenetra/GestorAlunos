<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Teste;

/**
 * TesteSearch represents the model behind the search form of `backend\models\Teste`.
 */
class TesteSearch extends Teste {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'percentagem', 'id_disciplina'], 'integer'],
            [['data', 'sala', 'duracao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {

        if (Yii::$app->user->can('permissoesProf')) {
            $id_user = \Yii::$app->user->identity->id;
            $query = Teste::find()
                    ->innerJoin('disciplina', 'disciplina.id = teste.id_disciplina')
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user);
            //->all();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $id_user = \Yii::$app->user->identity->id;
            $query = Teste::find()
                    ->innerJoin('disciplina', 'disciplina.id = teste.id_disciplina')
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user);
            //->all();
        } elseif (Yii::$app->user->can('gerirPermissoes')) {
            $query = Teste::find();
        } else {
            throw new ForbiddenHttpException;
        }

        //$query = Teste::find();
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
            'data' => $this->data,
            'duracao' => $this->duracao,
            'percentagem' => $this->percentagem,
            'id_disciplina' => $this->id_disciplina,
        ]);

        $query->andFilterWhere(['like', 'sala', $this->sala]);

        return $dataProvider;
    }

}

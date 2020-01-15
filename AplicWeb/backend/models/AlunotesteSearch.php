<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AlunoTeste;
use yii\web\NotFoundHttpException;

/**
 * AlunotesteSearch represents the model behind the search form of `backend\models\AlunoTeste`.
 */
class AlunotesteSearch extends AlunoTeste {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['aluno_id', 'teste_id', 'nota'], 'integer'],
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
        $id_user = \Yii::$app->user->identity->id;

        if (Yii::$app->user->can('gerirPermissoes')) {
            $query = AlunoTeste::find();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $query = AlunoTeste::find()
                    ->innerJoin('teste', 'teste.id = aluno_teste.teste_id')
                    ->innerJoin('disciplina', 'disciplina.id = teste.id_disciplina')
                    ->innerJoin('curso', 'curso.id = disciplina.curso_id AND curso.diretor_curso =' . $id_user);
        } elseif (Yii::$app->user->can('permissoesProf')) {
            $query = AlunoTeste::find()
                    ->innerJoin('teste', 'teste.id = aluno_teste.teste_id')
                    ->innerJoin('disciplina', 'disciplina.id = teste.id_disciplina')
                    ->innerJoin('professor', 'professor.id_perfil = disciplina.id_professor AND professor.id_perfil =' . $id_user);
        } else {
            throw new ForbiddenHttpException;
        }

        //$query = AlunoTeste::find();
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
            'aluno_id' => $this->aluno_id,
            'teste_id' => $this->teste_id,
            'nota' => $this->nota,
        ]);

        return $dataProvider;
    }

}

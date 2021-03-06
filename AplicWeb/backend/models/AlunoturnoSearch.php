<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AlunoTurno;

/**
 * AlunoturnoSearch represents the model behind the search form of `backend\models\AlunoTurno`.
 */
class AlunoturnoSearch extends AlunoTurno {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['aluno_id', 'turno_id'], 'integer'],
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
            $query = AlunoTurno::find();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $query = AlunoTurno::find()
                    ->innerJoin('turno', 'aluno_turno.turno_id = turno.id')
                    ->innerJoin('disciplina', 'disciplina.id = turno.id_disciplina')
                    ->innerJoin('curso', 'curso.id = disciplina.curso_id AND curso.diretor_curso = ' . $id_user)
                    ->innerJoin('professor', 'disciplina.id_professor = professor.id_perfil AND professor.id_perfil = ' . $id_user);
        } elseif (Yii::$app->user->can('permissoesProf')) {
            $query = AlunoTurno::find()
                    ->innerJoin('turno', 'turno.id = aluno_turno.turno_id')
                    ->innerJoin('disciplina', 'disciplina.id = turno.id_disciplina AND disciplina.id_professor = ' . $id_user);
        } else {
            throw new ForbiddenHttpException;
        }

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
            'turno_id' => $this->turno_id,
        ]);

        return $dataProvider;
    }

}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AlunoDisciplina;

/**
 * AlunodisciplinaSearch represents the model behind the search form of `backend\models\AlunoDisciplina`.
 */
class AlunodisciplinaSearch extends AlunoDisciplina {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['aluno_id', 'disciplina_id', 'nota'], 'integer'],
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

        if (Yii::$app->user->can('permissoesProf')) {
            $query = AlunoDisciplina::find()
                    ->innerJoin('disciplina', 'disciplina.id = aluno_disciplina.disciplina_id')
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user);
            //->all();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $query = AlunoDisciplina::find()
                    //->innerJoin('turno', 'turno.id = aluno_disciplina.turno_id')
                    ->innerJoin('disciplina', 'disciplina.id = aluno_disciplina.disciplina_id')
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user);
            //->all();
        } elseif (Yii::$app->user->can('gerirPermissoes')) {
            $query = AlunoDisciplina::find();
        } else {
            throw new ForbiddenHttpException;
        }

        //$query = AlunoDisciplina::find();
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
            'disciplina_id' => $this->disciplina_id,
            'nota' => $this->nota,
        ]);

        return $dataProvider;
    }

}

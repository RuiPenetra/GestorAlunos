<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Turno;

/**
 * TurnoSearch represents the model behind the search form of `backend\models\Turno`.
 */
class TurnoSearch extends Turno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_disciplina'], 'integer'],
            [['tipo'], 'safe'],
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
        
        
        $id_user = \Yii::$app->user->identity->id;

        if (Yii::$app->user->can('permissoesDiretor')) {
            $query = Turno::find()
                    ->innerJoin('disciplina', 'disciplina.id = turno.id_disciplina')
                    ->innerJoin('curso', 'disciplina.curso_id = curso.id')
                    ->innerJoin('diretor_curso a', 'curso.diretor_curso = ' . $id_user);//a.id_professor = 
                    //->innerJoin('professor', 'professor.id_perfil = ' . $id_user)
                   // ->all();
        } elseif (Yii::$app->user->can('gerirPermissoes')) {
            $query = Turno::find();
        } else {
            throw new ForbiddenHttpException;
        }
        
        //$query = Turno::find();

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
            'id_disciplina' => $this->id_disciplina,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}

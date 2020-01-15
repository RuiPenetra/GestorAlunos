<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property string $nome
 * @property string $abreviatura
 * @property int $ano
 * @property int $tipo_curso
 * @property int $id_escola
 * @property int $diretor_curso
 *
 * @property Aluno[] $alunos
 * @property TipoCurso $tipoCurso
 * @property Escola $escola
 * @property DiretorCurso $diretorCurso
 * @property Disciplina[] $disciplinas
 * @property Horario[] $horarios
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required','message' => 'Introduza um nome!'],
            [['abreviatura'], 'required','message' => 'Introduza uma abreviatura!'],
            [['ano'], 'required','message' => 'Tem de selecionarum ano!'],
            [['tipo_curso'], 'required','message' => 'Tem de selecionar um tipo de curso!'],
            [['id_escola'], 'required','message' => 'Tem de selecionar uma escola!'],
            [['diretor_curso'], 'required','message' => 'Tem de selecionar um professor!'],
            [['ano', 'tipo_curso', 'id_escola', 'diretor_curso'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['tipo_curso'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCurso::className(), 'targetAttribute' => ['tipo_curso' => 'id']],
            [['id_escola'], 'exist', 'skipOnError' => true, 'targetClass' => Escola::className(), 'targetAttribute' => ['id_escola' => 'id']],
            [['diretor_curso'], 'exist', 'skipOnError' => true, 'targetClass' => DiretorCurso::className(), 'targetAttribute' => ['diretor_curso' => 'id_professor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviatura' => 'Abreviatura',
            'ano' => 'Ano',
            'tipo_curso' => 'Tipo de curso',
            'id_escola' => 'Escola',
            'diretor_curso' => 'Diretor de curso',
            'tipoCurso.nome' => 'Curso',
            'escola.nome' => 'Escola',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_curso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCurso()
    {
        return $this->hasOne(TipoCurso::className(), ['id' => 'tipo_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscola()
    {
        return $this->hasOne(Escola::className(), ['id' => 'id_escola']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiretorCurso()
    {
        return $this->hasOne(DiretorCurso::className(), ['id_professor' => 'diretor_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['curso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['id_curso' => 'id']);
    }
}

<?php

namespace frontend\models;

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
 *
 * @property Aluno[] $alunos
 * @property TipoCurso $tipoCurso
 * @property Escola $escola
 * @property Horario[] $horarios
 * @property LinhaDiscCur[] $linhaDiscCurs
 * @property Disciplina[] $discs
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
            [['nome', 'abreviatura', 'ano', 'tipo_curso', 'id_escola'], 'required'],
            [['ano', 'tipo_curso', 'id_escola'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['tipo_curso'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCurso::className(), 'targetAttribute' => ['tipo_curso' => 'id']],
            [['id_escola'], 'exist', 'skipOnError' => true, 'targetClass' => Escola::className(), 'targetAttribute' => ['id_escola' => 'id']],
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
            'tipo_curso' => 'Tipo Curso',
            'id_escola' => 'Id Escola',
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
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['id_curso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaDiscCurs()
    {
        return $this->hasMany(LinhaDiscCur::className(), ['id_curso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscs()
    {
        return $this->hasMany(Disciplina::className(), ['id' => 'id_disc'])->viaTable('linha_disc_cur', ['id_curso' => 'id']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property int $id_horario
 * @property string $nome
 * @property string $abreviatura
 * @property int $tipo_curso
 *
 * @property Aluno[] $alunos
 * @property TipoCurso $tipoCurso
 * @property Horario $horario
 * @property LinhaDiscCur[] $linhaDiscCurs
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
            [['id_horario', 'nome', 'abreviatura', 'tipo_curso'], 'required'],
            [['id_horario', 'tipo_curso'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['tipo_curso'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCurso::className(), 'targetAttribute' => ['tipo_curso' => 'id']],
            [['id_horario'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['id_horario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_horario' => 'Id Horario',
            'nome' => 'Nome',
            'abreviatura' => 'Abreviatura',
            'tipo_curso' => 'Tipo Curso',
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
    public function getHorario()
    {
        return $this->hasOne(Horario::className(), ['id' => 'id_horario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaDiscCurs()
    {
        return $this->hasMany(LinhaDiscCur::className(), ['id_curso' => 'id']);
    }
}

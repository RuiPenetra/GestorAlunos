<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id
 * @property string $nome
 * @property string $abreviatura
 * @property int $id_professor
 *
 * @property Professor $professor
 * @property LinhaDiscCur[] $linhaDiscCurs
 * @property Curso[] $cursos
 * @property Teste[] $testes
 * @property Turno[] $turnos
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'abreviatura', 'id_professor'], 'required'],
            [['id_professor'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_professor']],
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
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaDiscCurs()
    {
        return $this->hasMany(LinhaDiscCur::className(), ['id_disc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id' => 'id_curso'])->viaTable('linha_disc_cur', ['id_disc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['id_disciplina' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turno::className(), ['id_disciplina' => 'id']);
    }
}

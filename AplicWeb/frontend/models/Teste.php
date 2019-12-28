<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teste".
 *
 * @property int $id
 * @property string $data
 * @property string $sala
 * @property string $duracao
 * @property int $percentagem
 * @property int $id_disciplina
 *
 * @property AlunoTeste[] $alunoTestes
 * @property Aluno[] $alunoIdPerfils
 * @property Disciplina $disciplina
 */
class Teste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'sala', 'duracao', 'percentagem', 'id_disciplina'], 'required'],
            [['data', 'duracao'], 'safe'],
            [['percentagem', 'id_disciplina'], 'integer'],
            [['sala'], 'string', 'max' => 255],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'sala' => 'Sala',
            'duracao' => 'Duracao',
            'percentagem' => 'Percentagem',
            'id_disciplina' => 'Disciplina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoTestes()
    {
        return $this->hasMany(AlunoTeste::className(), ['teste_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoIdPerfils()
    {
        return $this->hasMany(Aluno::className(), ['id_perfil' => 'aluno_id_perfil'])->viaTable('aluno_teste', ['teste_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }
}

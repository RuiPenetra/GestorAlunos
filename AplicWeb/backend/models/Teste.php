<?php

namespace backend\models;

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

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * @param string $sala
     */
    public function setSala($sala)
    {
        $this->sala = $sala;
    }

    /**
     * @return string
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param string $duracao
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }

    /**
     * @return int
     */
    public function getPercentagem()
    {
        return $this->percentagem;
    }

    /**
     * @param int $percentagem
     */
    public function setPercentagem($percentagem)
    {
        $this->percentagem = $percentagem;
    }

    /**
     * @return int
     */
    public function getIdDisciplina()
    {
        return $this->id_disciplina;
    }

    /**
     * @param int $id_disciplina
     */
    public function setIdDisciplina($id_disciplina)
    {
        $this->id_disciplina = $id_disciplina;
    }


}

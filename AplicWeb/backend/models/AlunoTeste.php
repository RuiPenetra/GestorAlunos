<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aluno_teste".
 *
 * @property int $aluno_id
 * @property int $teste_id
 * @property int|null $nota
 *
 * @property Aluno $aluno
 * @property Teste $teste
 */
class AlunoTeste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno_teste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id', 'teste_id'], 'required'],
            [['aluno_id', 'teste_id', 'nota'], 'integer'],
            [['aluno_id', 'teste_id'], 'unique', 'targetAttribute' => ['aluno_id', 'teste_id']],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'id_perfil']],
            [['teste_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teste::className(), 'targetAttribute' => ['teste_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aluno_id' => 'Nome:',
            'teste_id' => 'Disciplina:',
            'nota' => 'Nota:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'aluno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeste()
    {
        return $this->hasOne(Teste::className(), ['id' => 'teste_id']);
    }
}

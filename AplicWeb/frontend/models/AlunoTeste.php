<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aluno_teste".
 *
 * @property int $aluno_id_perfil
 * @property int $teste_id
 * @property int|null $nota
 *
 * @property Aluno $alunoIdPerfil
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
            [['aluno_id_perfil', 'teste_id'], 'required'],
            [['aluno_id_perfil', 'teste_id', 'nota'], 'integer'],
            [['aluno_id_perfil', 'teste_id'], 'unique', 'targetAttribute' => ['aluno_id_perfil', 'teste_id']],
            [['aluno_id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id_perfil' => 'id_perfil']],
            [['teste_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teste::className(), 'targetAttribute' => ['teste_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aluno_id_perfil' => 'Aluno Id Perfil',
            'teste_id' => 'Teste ID',
            'nota' => 'Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoIdPerfil()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'aluno_id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeste()
    {
        return $this->hasOne(Teste::className(), ['id' => 'teste_id']);
    }
}

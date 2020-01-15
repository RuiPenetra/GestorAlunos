<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_curso".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property Curso[] $cursos
 */
class TipoCurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required','message' => 'Introduza um nome!'],
            [['descricao'], 'required','message' => 'Introduza uma descrição!'],
            [['nome', 'descricao'], 'string', 'max' => 255],
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
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['tipo_curso' => 'id']);
    }
}

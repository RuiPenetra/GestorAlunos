<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Horario;
use frontend\models\HorarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Aluno;
use frontend\models\Aula;

/**
 * HorarioController implements the CRUD actions for Horario model.
 */
class HorarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Horario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_user = \Yii::$app->user->identity->id;
        $alunos = Aluno::find()->where(['id_perfil' => $id_user])->all();
        foreach ($alunos as $aluno) {
          $horarios = Horario::find()->where(['id_curso' => $aluno->id_curso])->all();
        }

        foreach ($horarios as $horario) {
          $aulas = Aula::find()->orderBy(['inicio' => SORT_ASC])->where(['horario_id' => $horario->id])->all();
        }
        return $this->render('index', [
          'aulas' => $aulas,
        ]);
    }

    /**
     * Finds the Horario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Horario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Horario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

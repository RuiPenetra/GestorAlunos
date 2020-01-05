<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\AlunoTeste;

/**
 * AlunodisciplinaController implements the CRUD actions for AlunoDisciplina model.
 */
class TesteController extends Controller
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
     * Lists all AlunoDisciplina models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_user = \Yii::$app->user->identity->id;
        $alunotestes = AlunoTeste::find()->where(['aluno_id_perfil' => $id_user])->all();


        return $this->render('index', [
            'alunotestes' => $alunotestes,
        ]);
    }

    /**
     * Displays a single AlunoDisciplina model.
     * @param integer $aluno_id_perfil
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($aluno_id_perfil, $disciplina_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($aluno_id_perfil, $disciplina_id),
        ]);
    }

    /**
     * Finds the AlunoDisciplina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $aluno_id_perfil
     * @param integer $disciplina_id
     * @return AlunoDisciplina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aluno_id_perfil, $disciplina_id)
    {
        if (($model = AlunoDisciplina::findOne(['aluno_id_perfil' => $aluno_id_perfil, 'disciplina_id' => $disciplina_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

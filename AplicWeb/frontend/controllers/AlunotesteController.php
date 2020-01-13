<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AlunoTeste;
use frontend\models\AlunoDisciplina;
use frontend\models\AlunotesteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlunotesteController implements the CRUD actions for AlunoTeste model.
 */
class AlunotesteController extends Controller
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
     * Lists all AlunoTeste models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_user = \Yii::$app->user->identity->id;
        $alunotestes = AlunoTeste::find()->where(['aluno_id' => $id_user])->all();
        $alunodisciplinas = AlunoDisciplina::find()->where(['aluno_id' => $id_user])->all();

        return $this->render('index', [
            'alunotestes' => $alunotestes,
            'alunodisciplinas' => $alunodisciplinas,
        ]);
    }

}

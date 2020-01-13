<?php

namespace backend\controllers;

use backend\models\Aluno;
use backend\models\Turno;
use Yii;
use backend\models\AlunoTurno;
use backend\models\AlunoturnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlunoturnoController implements the CRUD actions for AlunoTurno model.
 */
class AlunoturnoController extends Controller
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
     * Lists all AlunoTurno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoturnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlunoTurno model.
     * @param integer $aluno_id
     * @param integer $turno_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($aluno_id, $turno_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($aluno_id, $turno_id),
        ]);
    }

    /**
     * Creates a new AlunoTurno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlunoTurno();
        $alunos = Aluno::find()->all();
        $turnos = Turno::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'alunos' => $alunos,
            'turnos' => $turnos,
        ]);
    }

    /**
     * Updates an existing AlunoTurno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $aluno_id
     * @param integer $turno_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($aluno_id, $turno_id)
    {
        $model = $this->findModel($aluno_id, $turno_id);
        $alunos = Aluno::find()->all();
        $turnos = Turno::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'alunos' => $alunos,
            'turnos' => $turnos,
        ]);
    }

    /**
     * Deletes an existing AlunoTurno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $aluno_id
     * @param integer $turno_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($aluno_id, $turno_id)
    {
        $this->findModel($aluno_id, $turno_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlunoTurno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $aluno_id
     * @param integer $turno_id
     * @return AlunoTurno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aluno_id, $turno_id)
    {
        if (($model = AlunoTurno::findOne(['aluno_id' => $aluno_id, 'turno_id' => $turno_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AlunoDisciplina;
use frontend\models\AlunodisciplinaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Disciplina;

/**
 * AlunodisciplinaController implements the CRUD actions for AlunoDisciplina model.
 */
class AlunodisciplinaController extends Controller
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
        $alunodisciplinas = AlunoDisciplina::find()->where(['aluno_id_perfil' => $id_user])->all();


        return $this->render('index', [
            'alunodisciplinas' => $alunodisciplinas,
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
     * Creates a new AlunoDisciplina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlunoDisciplina();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'disciplina_id' => $model->disciplina_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AlunoDisciplina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $aluno_id_perfil
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($aluno_id_perfil, $disciplina_id)
    {
        $model = $this->findModel($aluno_id_perfil, $disciplina_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'disciplina_id' => $model->disciplina_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AlunoDisciplina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $aluno_id_perfil
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($aluno_id_perfil, $disciplina_id)
    {
        $this->findModel($aluno_id_perfil, $disciplina_id)->delete();

        return $this->redirect(['index']);
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

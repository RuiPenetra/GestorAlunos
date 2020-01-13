<?php

namespace backend\controllers;

use Yii;
use backend\models\AlunoDisciplina;
use backend\models\AlunodisciplinaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Perfil;
use backend\models\Disciplina;

/**
 * AlunodisciplinaController implements the CRUD actions for AlunoDisciplina model.
 */
class AlunodisciplinaController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
    public function actionIndex() {
        $searchModel = new AlunodisciplinaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlunoDisciplina model.
     * @param integer $aluno_id
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($aluno_id, $disciplina_id) {
        return $this->render('view', [
                    'model' => $this->findModel($aluno_id, $disciplina_id),
        ]);
    }

    /**
     * Creates a new AlunoDisciplina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AlunoDisciplina();

        $perfis = Perfil::find()->innerJoin('aluno', 'aluno.id_perfil = perfil.id_user')->all();
        $disciplina = Disciplina::find()->all(); //, 'id_user', 'nome');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id' => $model->aluno_id, 'disciplina_id' => $model->disciplina_id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'perfis' => $perfis,
                    'disciplina' => $disciplina,
        ]);
    }

    /**
     * Updates an existing AlunoDisciplina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $aluno_id
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($aluno_id, $disciplina_id) {
        $model = $this->findModel($aluno_id, $disciplina_id);

        $perfis = Perfil::find()->innerJoin('aluno', 'aluno.id_perfil = perfil.id_user')->all();
        $disciplina = Disciplina::find()->all(); //, 'id_user', 'nome');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id' => $model->aluno_id, 'disciplina_id' => $model->disciplina_id]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'perfis' => $perfis,
                    'disciplina' => $disciplina,
        ]);
    }

    /**
     * Deletes an existing AlunoDisciplina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $aluno_id
     * @param integer $disciplina_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($aluno_id, $disciplina_id) {
        $this->findModel($aluno_id, $disciplina_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlunoDisciplina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $aluno_id
     * @param integer $disciplina_id
     * @return AlunoDisciplina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aluno_id, $disciplina_id) {
        if (($model = AlunoDisciplina::findOne(['aluno_id' => $aluno_id, 'disciplina_id' => $disciplina_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

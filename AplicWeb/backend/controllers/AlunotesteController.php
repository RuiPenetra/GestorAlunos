<?php

namespace backend\controllers;

use Yii;
use backend\models\AlunoTeste;
use backend\models\AlunotesteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Perfil;
use backend\models\Teste;

/**
 * AlunotesteController implements the CRUD actions for AlunoTeste model.
 */
class AlunotesteController extends Controller {

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
     * Lists all AlunoTeste models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AlunotesteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlunoTeste model.
     * @param integer $aluno_id_perfil
     * @param integer $teste_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($aluno_id_perfil, $teste_id) {
        return $this->render('view', [
                    'model' => $this->findModel($aluno_id_perfil, $teste_id),
        ]);
    }

    /**
     * Creates a new AlunoTeste model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AlunoTeste();

        $perfis = Perfil::find()->innerJoin('aluno', 'aluno.id_perfil = perfil.id_user')->all();
        $teste = Teste::find()->all(); //, 'id_user', 'nome');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'teste_id' => $model->teste_id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'perfis' => $perfis,
                    'teste' => $teste,
        ]);
    }

    /**
     * Updates an existing AlunoTeste model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $aluno_id_perfil
     * @param integer $teste_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($aluno_id_perfil, $teste_id) {
        $model = $this->findModel($aluno_id_perfil, $teste_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'teste_id' => $model->teste_id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AlunoTeste model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $aluno_id_perfil
     * @param integer $teste_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($aluno_id_perfil, $teste_id) {
        $this->findModel($aluno_id_perfil, $teste_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlunoTeste model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $aluno_id_perfil
     * @param integer $teste_id
     * @return AlunoTeste the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aluno_id_perfil, $teste_id) {
        if (($model = AlunoTeste::findOne(['aluno_id_perfil' => $aluno_id_perfil, 'teste_id' => $teste_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

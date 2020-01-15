<?php

namespace backend\controllers;

use Yii;
use backend\models\Presenca;
use backend\models\Aula;
use backend\models\Aluno;
use backend\models\Perfil;
use backend\models\PresencaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresencaController implements the CRUD actions for Presenca model.
 */
class PresencaController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all Presenca models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresencaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Faltas Aluno models.
     * @return mixed
     */
    public function actionListar($id)
    {
        $faltas = Presenca::find()->where(['id_perfil'=>$id])->all();
        $aluno = Perfil::find()->where(['id_user'=>$id])->one();

        return $this->render('faltasaluno', [
            //'searchModel' => $searchModel,
            'faltas' => $faltas,
            'aluno' => $aluno,
        ]);
    }

    /**
     * Displays a single Presenca model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Presenca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $id_user=$id;
        $model = new Presenca();
        $alunos = Aluno::find()->all();
        $aulas = Aula::find()->where(['id_professor'=>$id])->All();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'aulas' => $aulas,
            'alunos' => $alunos,
        ]);
    }

    /**
     * Updates an existing Presenca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id_user=\Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        $alunos = Aluno::find()->all();
        $aulas = Aula::find()->where(['id_professor'=>$id_user])->All();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'aulas' => $aulas,
            'alunos' => $alunos,
        ]);
    }

    /**
     * Deletes an existing Presenca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Presenca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presenca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presenca::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

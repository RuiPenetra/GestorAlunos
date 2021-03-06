<?php

namespace backend\controllers;

use backend\models\Disciplina;
use Yii;
use backend\models\Teste;
use backend\models\TesteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TesteController implements the CRUD actions for Teste model.
 */
class TesteController extends Controller {

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
     * Lists all Teste models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TesteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teste model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teste model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $id_user = \Yii::$app->user->identity->id;

        if (Yii::$app->user->can('permissoesProf')) {
            $disciplinas = Disciplina::find()
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
            //->all();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $disciplinas = Disciplina::find()
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
            //->all();
        } elseif (Yii::$app->user->can('gerirPermissoes')) {
            $disciplinas = Disciplina::find()
                    //->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
        } else {
            throw new ForbiddenHttpException;
        }


        $model = new Teste();
        // $disciplinas = Disciplina::find()->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'disciplinas' => $disciplinas,
        ]);
    }

    /**
     * Updates an existing Teste model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $id_user = \Yii::$app->user->identity->id;

        if (Yii::$app->user->can('permissoesProf')) {
            $disciplinas = Disciplina::find()
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
            //->all();
        } elseif (Yii::$app->user->can('permissoesDiretor')) {
            $disciplinas = Disciplina::find()
                    ->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
            //->all();
        } elseif (Yii::$app->user->can('gerirPermissoes')) {
            $disciplinas = Disciplina::find()
                    //->innerJoin('professor', 'disciplina.id_professor = ' . $id_user)
                    ->all(); //, 'id_user', 'nome');
        } else {
            throw new ForbiddenHttpException;
        }
        $model = $this->findModel($id);
        //$disciplinas = Disciplina::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'disciplinas' => $disciplinas,
        ]);
    }

    /**
     * Deletes an existing Teste model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teste model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teste the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Teste::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

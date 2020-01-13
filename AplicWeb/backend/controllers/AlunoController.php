<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\Curso;
use backend\models\Perfil;
use Yii;
use backend\models\Aluno;
use backend\models\AlunoSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class AlunoController extends Controller
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
     * Lists all Aluno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aluno model.
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
     * Creates a new Aluno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id_user = \Yii::$app->user->identity->id;

        if(Yii::$app->user->can('gerirPermissoes')){
            $model = new Aluno();
            $modelB = new AuthAssignment();
            $perfis = Perfil::find()->all();
            $cursos = Curso::find()->all();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $modelB->item_name = 'aluno';
                $modelB->id_user = $id_user;
                if ($modelB->save()){
                    return $this->redirect(['view', 'id' => $model->id_perfil]);
                }
            }

            return $this->render('create', [
                'model' => $model,
                'perfis' => $perfis,
                'cursos' => $cursos,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Aluno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('gerirPermissoes')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aluno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aluno::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException;
    }
}

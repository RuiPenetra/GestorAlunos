<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\Perfil;
use Yii;
use backend\models\Professor;
use backend\models\ProfessorSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfessorController implements the CRUD actions for Professor model.
 */
class ProfessorController extends Controller
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
     * Lists all Professor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfessorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Professor model.
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
     * Creates a new Professor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('gerirPermissoes')){
            $model = new Professor();
            $modelB = new AuthAssignment();
            $perfis = Perfil::find()->all();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $modelB->item_name = 'professor';
                $modelB->user_id = $model->id_perfil;
                $modelB->created_at = date("Y-m-d h:m:s");
                if ($modelB->save(false)){
                    return $this->redirect(['view', 'id' => $model->id_perfil]);
                }
                else{
                    throw new NotFoundHttpException;
                }
            }

            return $this->render('create', [
                'model' => $model,
                'perfis' => $perfis,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Professor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('gerirPermissoes')){
            if($this->findModelAuth($id)->delete()){
                $this->findModel($id)->delete();
            }
            return $this->redirect(['index']);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Professor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelAuth($user_id)
    {
        if (($model = AuthAssignment::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException;
    }
}

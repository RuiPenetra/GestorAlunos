<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\Professor;
use Yii;
use backend\models\DiretorCurso;
use backend\models\DiretorcursoSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiretorcursoController implements the CRUD actions for DiretorCurso model.
 */
class DiretorcursoController extends Controller
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
     * Lists all DiretorCurso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiretorcursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiretorCurso model.
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
     * Creates a new DiretorCurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('gerirPermissoes')){
            $model = new DiretorCurso();
            $modelB = new AuthAssignment();
            $professores = Professor::find()->all();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $modelB->item_name = 'diretorCurso';
                $modelB->user_id = $model->id_professor;
                $modelB->created_at = date("Y-m-d h:m:s");
                if ($modelB->save(false)){
                    return $this->redirect(['view', 'id' => $model->id_professor]);
                }
                else{
                    throw new NotFoundHttpException;
                }

            }

            return $this->render('create', [
                'model' => $model,
                'professores' => $professores,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }


    /**
     * Deletes an existing DiretorCurso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('gerirPermissoes')){
            try {
              if($this->findModelAuth($id)->delete() && $this->findModel($id)->delete()){
                  return $this->redirect(['index']);
              }


            } catch (\Exception $e) {
              throw new \Exception("Tem Registos associados", 1);
            }
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the DiretorCurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DiretorCurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DiretorCurso::findOne($id)) !== null) {
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

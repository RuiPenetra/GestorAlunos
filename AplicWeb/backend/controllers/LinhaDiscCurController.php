<?php

namespace backend\controllers;

use Yii;
use backend\models\LinhaDiscCur;
use backend\models\LinhaDiscCurSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhaDiscCurController implements the CRUD actions for LinhaDiscCur model.
 */
class LinhaDiscCurController extends Controller
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
     * Lists all LinhaDiscCur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LinhaDiscCurSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LinhaDiscCur model.
     * @param integer $id_curso
     * @param integer $id_disc
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_curso, $id_disc)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_curso, $id_disc),
        ]);
    }

    /**
     * Creates a new LinhaDiscCur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LinhaDiscCur();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_curso' => $model->id_curso, 'id_disc' => $model->id_disc]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LinhaDiscCur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_curso
     * @param integer $id_disc
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_curso, $id_disc)
    {
        $model = $this->findModel($id_curso, $id_disc);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_curso' => $model->id_curso, 'id_disc' => $model->id_disc]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LinhaDiscCur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_curso
     * @param integer $id_disc
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_curso, $id_disc)
    {
        $this->findModel($id_curso, $id_disc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LinhaDiscCur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_curso
     * @param integer $id_disc
     * @return LinhaDiscCur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_curso, $id_disc)
    {
        if (($model = LinhaDiscCur::findOne(['id_curso' => $id_curso, 'id_disc' => $id_disc])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

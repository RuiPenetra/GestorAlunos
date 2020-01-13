<?php

namespace backend\controllers;

use backend\models\DiretorCurso;
use backend\models\Professor;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\Aluno;
use backend\models\Curso;
use backend\models\Disciplina;
use backend\models\Escola;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $id_user = \Yii::$app->user->identity->id;

        if(Aluno::find()->where(['id_perfil' => $id_user])->one()){
            $this->actionLogout();
        }
        elseif (Professor::find()->where(['id_perfil' => $id_user])->one()){
            if(DiretorCurso::find()->where(['id_professor' => $id_user])->one()){
                $this->layout = 'DiretorCurso';
            }
            else{
                $this->layout = 'Professores';
            }
        }
        else{
            $this->layout = 'main';
        }

        $alunos = Aluno::find()->all();
        $cursos = Curso::find()->all();
        $disciplinas = Disciplina::find()->all();
        $escolas = Escola::find()->all();

        $alunos = count($alunos);
        $cursos = count($cursos);
        $disciplinas = count($disciplinas);
        $escolas = count($escolas);

        return $this->render('index', ['alunos' => $alunos, 'cursos' => $cursos, 'disciplinas' => $disciplinas, 'escolas' => $escolas,]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        $this->layout = 'LoginLayout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', ['model' => $model,]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionError() {
        return $this->render('error');
    }

}

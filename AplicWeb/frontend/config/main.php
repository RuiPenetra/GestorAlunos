<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Aluno', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Aula', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Comentario', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Curso', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Diasem', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Diretorcurso', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Disciplina', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Escola', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Feriado', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Horario', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Linhadisccur', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Notificacao', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Pagamento', 'pluralize' => 'false'],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Perfil', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Presenca', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Professor', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Publicacao', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Registofalta', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Subcomentario', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Teste', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Tipocurso', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Tipofalta', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Tiponotificacao', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Tipoturno', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'Turno', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
              ['class' => 'yii\rest\UrlRule', 'controller' => 'User', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
            ],
        ],
    ],
    'params' => $params,
];

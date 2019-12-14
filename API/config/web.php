<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'B5qnea5y34bl20e2DShmYNzarxlyWhNa',
            'parsers' => [
              'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
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
            ['class' => 'yii\rest\UrlRule', 'controller' => 'Pagamento', 'pluralize' => 'false', 'except' => ['create', 'update', 'delete']],
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

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

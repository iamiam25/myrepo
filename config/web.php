<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    //маршрут по умолчанию
   // 'defaultRoute' => 'checkuser/index',
    'language'=>'ru',
    'timeZone' => 'UTC',
    'bootstrap' => ['log'],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'N7B36m9kS39Z3_AfM0kYBVrHk0M0PbLg',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //правила для отображение только выидов для контроллера сайт
               //s '<action>' => 'site/<action>',
            ],
        ],

       'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y H:i',
            //'timeFormat' => 'php:H:i:s',
            'timeZone' => 'Europe/Kiev',
           'defaultTimeZone' => 'UTC',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\module',
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/admin.php',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
           'site/*',
           //  'admin/*',
          //   'rbac/*',
          //  'gii/*',
           //  'checkuser/index',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

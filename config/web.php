<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => '/match/match-history',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\admin',
        ],
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                // site pages
                '/' => '/match/match-history',
                '/registration' => '/user/registration',
                '/login' => '/site/login',
                '/statistics' => '/statistics/index',

                // admin module
                '/admin' => '/admin/default/index',

                '/admin/matches' => '/admin/match/index',
                '/admin/match/create' => '/admin/match/create',
                '/admin/match/update/<id:\d+>' => '/admin/match/update',
                '/admin/match/view/<id:\d+>' => '/admin/match/view',
                '/admin/match/delete/<id:\d+>' => '/admin/match/delete',

                '/admin/score-history' => '/admin/score-history/index',
                '/admin/score-history/view/<matchId:\d+>' => '/admin/score-history/view',
                '/admin/score-history/create/<matchId:\d+>' => '/admin/score-history/create',

                // ajax controller
                '/ajax' => '/ajax/<action:\w+>',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ur&*3nVU&#vj',
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;

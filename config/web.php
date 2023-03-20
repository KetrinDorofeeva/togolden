<?php
    $params = require __DIR__ . '/params.php';
    $db = require __DIR__ . '/db.php';

    $config = [
        'id' => 'basic',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log'],
        'language' => 'ru-RU',
        'aliases' => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
        ],
        'components' => [
            'request' => [
                'cookieValidationKey' => 'Ity0SDoYdwVpsSgisZKGgjNEkXfhj8Td',
                'baseUrl' => '',
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
                // 'useFileTransport' to false and configure transport
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
                    //Страница компании
                    [
                        'pattern' => 'site/view/<id>',
                        'route' => 'site/view',
                    ],

                    //Редактирование компании
                    [
                        'pattern' => 'site/update/<id>',
                        'route' => 'site/update',
                    ],

                    //Удаление компании
                    [
                        'pattern' => 'site/delete/<id>',
                        'route' => 'site/delete',
                    ],

                    //Личный кабинет пользователя
                    [
                        'pattern' => 'personal/page/<id>',
                        'route' => 'personal/page',
                    ],

                    //Редактировать информацию о пользователе
                    [
                        'pattern' => 'personal/update/<id>',
                        'route' => 'personal/update',
                    ],
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
?>
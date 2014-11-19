<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'thumbnail'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'sTz>UWw(7Nz]XxWVrZvg+Ix }ghzSlAt1oqr%nw.`ZY{|wP`G$ 9h,XGJ #WvO|D',
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'thumbnail' => [
            'class' => 'himiklab\thumbnail\EasyThumbnail',
            'cacheAlias' => 'assets/gallery_thumbnails',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>array(
                'books'                          => 'book/index',
                'subjects'                       => 'subject/index',
                'book/<id:\d+>/<title:.*?>'      => 'book/view',
                'subject/<id:\d+>/<name:.*?>'    => 'subject/view',
            ),
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

return $config;

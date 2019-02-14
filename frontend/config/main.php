<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => array(
                'cars/<slug:\w+>' => 'cars/view',
                'cars/<slug:\w+>/update' => 'cars/update',
                'cars/create/<slug:\w+>' => 'cars/create',
                
                'stores/<slug:\w+>' => 'stores/view',
                'stores/<slug:\w+>/update' => 'stores/update',
                'stores/create/<slug:\w+>' => 'stores/create',
                
                
                'view/<id:\d+>' => 'post/view',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<secondcontroller/<action:.*>' => 'secondcontroller/<action>',
                '<action:.*>' => 'site/<action>',
            ),
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                ],
                'language' => 'ar-AR'
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '351891235308423',
                    'clientSecret' => 'acfe78cbec28e1154a86d6373b1f5706',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
                'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'consumerKey' => 'gnGR6wHNcIaZTzN5PKwVH1sRg',
                    'consumerSecret' => 'C2nqvCVk7UF0ug4qr1LFFZwGrQ230UrW32gGpYTF1BMuLlJSxZ'
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '809759260225-v3dkimc9usecphljohgn6lcsae91ik0j.apps.googleusercontent.com',
                    'clientSecret' => 'r30hKih3YRe-hAoOrMwLZwJP',
                    'returnUrl' => 'http://kidzmania.com/site/auth?authclient=Google',
                ],
            ],
        ],
        'imageresize' => [
            'class' => 'noam148\imageresize\ImageResize',
            //path relative web folder
            'cachePath' => '/images',
            //use filename (seo friendly) for resized images else use a hash
            'useFilename' => true,
            //show full url (for example in case of a API)
            'absoluteUrl' => false,
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
    ],
    'params' => $params,
];

<?php
/**
 * User: Администратор
 * Date: 05.10.2017
 * Time: 1:02
 */

$params = array_merge(
    require( __DIR__ . '/../../common/config/params.php' ),
    require( __DIR__ . '/../../common/config/params-local.php' ),
    require( __DIR__ . '/params.php' )
);
return [
    'id'                  => 'app-api',
    'basePath'            => dirname( __DIR__ ),
    'controllerNamespace' => 'api\controllers',
    'bootstrap'           => [ 'log' ],
    'modules'             => [ ],
    'components'          => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
        ],
        'user'       => [
            'identityClass' => '\common\models\User',
            'enableSession' => false,
            'loginUrl'      => null
        ],
        'log'        => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ],
    ],
    'params'              => $params,
//    'request' => [
//        'parsers' => [
//            'application/json' => 'yii\web\JsonParser',
//        ]
//    ],
];
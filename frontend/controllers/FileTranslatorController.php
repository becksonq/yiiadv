<?php
/**
 * User: Администратор
 * Date: 04.10.2017
 * Time: 21:12
 */

namespace frontend\controllers;

use yii;
use yii\web\Controller;

class FileTranslatorController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->language = 'en-US';
        $englishText = \Yii::t( 'app', 'Hello World!' );

        \Yii::$app->language = 'it-IT';
        $italianText = \Yii::t( 'app', 'Hello World!' );

        \Yii::$app->language = 'ru-RU';
        $russianText = \Yii::t( 'app', 'Hello World!' );

        return $this->render( 'index', [ 'englishText' => $englishText, 'italianText' => $italianText, 'russianText' => $russianText ] );
    }
}
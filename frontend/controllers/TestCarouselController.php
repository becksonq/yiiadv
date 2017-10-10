<?php
/**
 * User: Администратор
 * Date: 09.10.2017
 * Time: 19:43
 */

namespace frontend\controllers;


use yii\web\Controller;
use common\models\Room;

class TestCarouselController extends Controller
{
    public function actionIndex()
    {
        $models = Room::find()->limit( 3 )->all();
        return $this->render( 'index', [ 'models' => $models ] );
    }
}
<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Room;

class RoomsController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider( [
            'query'      => Room::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ] );

        return $this->render( 'index', [
            'dataProvider' => $dataProvider,
        ] );
    }

}

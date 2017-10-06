<?php

namespace api\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;

class ReservationsController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Reservation';

    public function actionIndexWithRooms()
    {
        $reservations = \common\models\Reservation::find()->all();
        $outData = [ ];
        foreach ( $reservations as $r ) {
            $outData[] = array_merge( $r->attributes, [
                'room' => $r->room->attributes
            ] );
        }
        return $outData;
    }

    public function actionIndex()
    {
        return $this->render( 'index' );
    }
}

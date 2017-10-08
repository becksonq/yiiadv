<?php
/**
 * User: Администратор
 * Date: 07.10.2017
 * Time: 22:18
 */

namespace console\controllers;

use yii\console\Controller;

/**
 * Manage reservations
 */
class ReservationsController extends Controller
{
    /**
     * Update 'expired' field of reservations
     */
    public function actionUpdateExpired()
    {
        $models = \common\models\Reservation::find()->all();

        foreach ( $models as $m ) {
            echo sprintf( 'Check reservation #%d - date_to = %s - status : %s', $m->id, $m->date_to,
                ( strtotime( $m->date_to ) <= time() ) ? 'OK' : 'Expired' );
            echo "\n";
            // Set expired field. I'll for every model because if we could have changed 'date_to' value.
            $m->expired = ( strtotime( $m->date_to ) <= time() ) ? 0 : 1;
            $m->save();
        }

        // equivalent to return 0;
        return Controller::EXIT_CODE_NORMAL;
    }

    public function actionReservationsOfTheDay( $currentDate = null )
    {
        if ( $currentDate == null ) {
            $currentDate = date( 'Y-m-d' );
        }

        $models = \common\models\Reservation::find()->where( 'DATE(reservation_date) = "' . $currentDate . '"' )->all();
        \Yii::$app->mailer->compose( [
            'html' => 'reservationsOfTheDay-html',
            'text' => 'reservationsOfTheDay-text'
        ], [
            'models'      => $models,
            'currentDate' => $currentDate
        ] )
            ->setFrom( 'myemail@example.com' )
            ->setTo( 'administrator@example.com' )
            ->setSubject( 'Reservations of the day: ' . $currentDate )
            ->send();
    }
}
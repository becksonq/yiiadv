<?php
/**
 * User: Администратор
 * Date: 06.10.2017
 * Time: 9:45
 */

namespace api\components;

use Yii;
use yii\filters\auth\AuthMethod;

class SessionAuth extends AuthMethod
{
    public $tokenParam = 'sid';

    public function authenticate( $user, $request, $response )
    {
        $accessToken = $request->get( $this->tokenParam );
        if ( is_string( $accessToken ) ) {
            Yii::$app->session->id = $accessToken;
            $identity = isset( Yii::$app->session['loggedUser'] ) ? Yii::$app->session['loggedUser'] : null;
            if ( $identity !== null ) {
                return $identity;
            }
        }
        if ( $accessToken !== null ) {
            $this->handleFailure( $response );
        }
        return null;
    }
}
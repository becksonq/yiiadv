<?php
/**
 * User: Администратор
 * Date: 06.10.2017
 * Time: 21:11
 */

namespace api\components;

use yii\web\ResponseFormatterInterface;

class RssResponseFormatter implements ResponseFormatterInterface
{
    public function format( $response )
    {
        $response->getHeaders()->set( 'Content-Type', 'application/rss+xml; charset=UTF-8' );
        if ( $response->data !== null ) {
            $rssOut = '<?xml version="1.0" encoding="UTF-8"?>';
            $rssOut .= '<rss>';
            $rssOut .= '<channel>';
            foreach ( $response->data as $d ) {
                $rssOut .= '<item>';
                $rssOut .= sprintf( '<title>Room #%d at floor %d</title>', $d['id'], $d['floor'] );
                $rssOut .= '</item>';
            }
            $rssOut .= '</channel>';
            $rssOut .= '</rss>';
            $response->content = $rssOut;;
        }
    }
}
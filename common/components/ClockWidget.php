<?php
/**
 * User: Администратор
 * Date: 09.10.2017
 * Time: 18:32
 */

namespace common\components;


use yii\base\Widget;

class ClockWidget extends Widget
{
    public function init()
    {
        \yii\web\JqueryAsset::register( $this->getView() );
    }

    public function run()
    {
        return $this->render( 'clock' );
    }
}
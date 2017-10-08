<?php
/**
 * User: Администратор
 * Date: 07.10.2017
 * Time: 23:18
 */

namespace console\controllers;


use yii\console\Controller;
use \yii\helpers\Console;

/**
 * Colors dedicated controller
 */
class ColorController extends Controller
{
    /**
     * Simply return a welcome text
     */
    public function actionIsClientEnabled()
    {
        if ( $this->isColorEnabled() ) {
            $this->stdout( 'OK, terminal supports colors!' );
        }
        else {
            $this->stdout( 'NOT OK, terminal does not support colors!' );
        }
        $this->stdOut( "\n" );
        // equivalent to return 0;
        return Controller::EXIT_CODE_NORMAL;
    }

    public function actionPrintColouredText()
    {
        $colouredText = $this->ansiFormat( 'This text is coloured', Console::FG_RED );
        $normalText = "This text is normal";
        $this->stdout( sprintf( "%s - %s\n", $normalText, $colouredText ) );
    }
}
<?php
/**
 * User: Администратор
 * Date: 06.10.2017
 * Time: 23:43
 */

namespace console\controllers;

use yii\console\Controller;

/**
 * This is an example controller
 */
class MyExampleController extends Controller
{
    public $option1;
    public $option2;

    public function options( $action )
    {
        return [ 'option1' ];
    }

    /**
     * Simply return a welcome text
     */
    public function actionTest( $param1 )
    {
        echo 'this is my first controller using console application';
        echo "\n";
        echo "You have passed param1 with value: " . $param1;
        echo "\n";
        echo "Value of option1 is: " . $this->option1;
        echo "\n";
        // equivalent to return 0;
        return Controller::EXIT_CODE_NORMAL;
    }
}
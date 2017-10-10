<?php
/**
 * User: Администратор
 * Date: 10.10.2017
 * Time: 15:35
 * This file contains a controller to demonstrate api documentation
 * tool.
 *
 * @link http://www.example.com/
 * @copyright Copyright (c) 2015
 * @license http://www.example.com/license/
 */

namespace frontend\controllers;

use yii;
use yii\web\Controller;

/**
 * This is a controller class to demonstrate api documentation tool.
 *
 * @author Fabrizio Caldarelli
 * @since 1.0
 */
class TestDocController extends Controller
{
    /**
     * Make sum of the operands
     *
     * @param float $a first operand
     * @param float $b second operand
     * @return float sum of parameters
     * @author
     */
    public function makeSum( float $a, float $b )
    {
        return $a + $b;
    }
}
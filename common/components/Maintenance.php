<?php
/**
 * User: Администратор
 * Date: 10.10.2017
 * Time: 0:43
 */

namespace common\components;

use yii;
use yii\base\Component;

class Maintenance extends Component
{
    public function launchBackup( $database, $username, $password, $pathDestSqlFile )
    {
        $cmd = sprintf( 'mysqldump -u %s -p%s %s > %s', $username, $password, $database, $pathDestSqlFile );
        $outputLines = [ ];
        exec( $cmd, $outputLines, $exitCode );
        
        return [
            'cmd'         => $cmd,
            'exitCode'    => $exitCode,
            'outputLines' => $outputLines
        ];
    }
}
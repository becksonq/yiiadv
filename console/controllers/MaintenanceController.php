<?php
/**
 * User: Администратор
 * Date: 10.10.2017
 * Time: 11:33
 */

namespace console\controllers;

use yii;
use yii\console\Controller;
use \yii\helpers\Console;
use \common\components\Maintenance;

class MaintenanceController extends Controller
{
    /**
     * @return mixed
     */
    public function actionBackupDatabase()
    {
        $tmpfname = tempnam( sys_get_temp_dir(), 'FOO' );
        $obj = new Maintenance();
        $ret = $obj->launchBackup( 'yii2-starter-basic', 'root', '', $tmpfname );

        if ( $ret['exitCode'] == 0 ) {
            $this->stdout( "OK\n" );
            $this->stdout( sprintf( "Backup successfully stored in: %s\n", $tmpfname ) );
        }
        else {
            $this->stdout( "ERR\n" );
        }
        // equivalent to return 0;
        return $ret['exitCode'];
    }

    /**
     * @return mixed
     */
    public function actionBackupDatabaseAndSendEmail()
    {
        $tmpfname = tempnam( sys_get_temp_dir(), 'FOO' ); // good
        $obj = new Maintenance();
        $ret = $obj->launchBackup( 'username', 'password', 'database_name', $tmpfname );
        $emailAttachment = null;

        if ( $ret['exitCode'] == 0 ) {
            $this->stdout( "OK\n" );
            $this->stdout( sprintf( "Backup successfully stored in: %s\n", $tmpfname ) );
            $textEmail = 'Backup database successful! Find it in attachment';
            $emailAttachment = $tmpfname;
        }
        else {
            $this->stdout( "ERR\n" );
            $textEmail = 'Error in backup database! Check it!';
        }

        $emailMsg = Yii::$app->mailer->compose()->setFrom( 'from@example.com' )
            ->setTo( 'to@example.com' )
            ->setSubject( 'Backup database' )
            ->setTextBody( $textEmail );

        if ( $emailAttachment != null ) {
            $emailMsg->attach( $emailAttachment, [ 'fileName' => 'backup_db.sql' ] );
        }

        $emailMsg->send();
        // equivalent to return 0;
        return $ret['exitCode'];
    }
}
<?php 
define('ABSPATH',  dirname(__DIR__, 1));
require ABSPATH . "/includes.php";

$action = $_POST['act'];
/*****************************/
/*      ADMIN SIGNIN         */
/*****************************/

if ($action == 'signInAdmin') {
    ob_clean();

    $resultData = Admin::checkCredentials($_POST['username'], $_POST['password']);
    SessionWrite('useremail', $resultData[1]->mobile);
    SessionWrite('username', $resultData[1]->username);    
    SessionWrite('admin_id', $resultData[1]->id);
    echo $resultData[0];

    exit();
}
?>
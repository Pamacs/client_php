<?php
foreach ($_POST as $key => $val) {
    echo "Key: ".$key.", Value: $val"." | ";
}

require '../util/req_util.php';
require '../util/notifier.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_POST['type']) {

    case 'register': {
        
        $res = sendReq("auth/register", ReqMethod::POST, true, [
            'password' => $_POST['password'],
            'register_key' => $_POST['register_key']
        ]);

        if ($res["type"] == "SUCCESS") {
            forceful_feedback( "Registration Successful", ["Your new UserID: ".$res["data"]["user_id"], "The account's recovery key (!!!): ".$res["data"]["recovery_key"]] );
        } else {
            throw_error($res["message"], "The input can't be validated properly");
        }

        break;
    }
    case 'login': {
        
        $res = sendReq("auth/login", ReqMethod::POST, false, array(
            'user_id' => $_POST['user_id'],
            'password' => $_POST['password']
        ));

        echo $res;

        break;
    }
}
?>
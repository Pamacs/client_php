<?php
foreach ($_POST as $key => $val) {
    echo "Key: ".$key.", Value: $val"." | ";
}

require_once '../util/req_util.php';
require_once '../util/notifier.php';

switch ($_POST['type']) {

    case 'register': {
        
        $res = sendReq("auth/register", ReqMethod::POST, true, [
            'password' => $_POST['password'],
            'register_key' => $_POST['register_key']
        ]);

        if ($res["type"] == "SUCCESS") {
            forceful_feedback( "Registration Successful", [
                    "0" => "Your new UserID: ".$res["data"]["user_id"],
                    "1" => "The account's recovery key (!!!): ".$res["data"]["recovery_key"],
                    $config["root"]."auth/login" => "> Back to login"
                ] );
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
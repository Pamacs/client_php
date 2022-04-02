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

        switch ($res['type']) {

            case "SUCCESS": {
                forceful_feedback( "Registration Successful", [
                    "0" => "Your new UserID: ".$res["data"]["user_id"],
                    "1" => "The account's recovery key (!!!): ".$res["data"]["recovery_key"],
                    $config["root"]."auth/login" => "> Back to login"
                ] );
                break;
            }
            case "ERROR": {
                throw_error($res["message"], "The input can't be validated properly");
                break;
            }
        }

        break;
    }

    case 'login': {
        
        $res = sendReq("auth/login", ReqMethod::POST, true, array(
            'user_id' => $_POST['user_id'],
            'password' => $_POST['password']
        ));

        switch ($res['type']) {

            case "SUCCESS": {

                session_start();

                $_SESSION['access_token'] = $res['data']['access_token'];

                

                break;
            }
            case "ERROR": {

                switch($res['message']) {
                    case "MALFORMED_INPUT": {
                        throw_error($res["message"], "The input can't be validated properly");
                        break;
                    }
                    case "CREDENTIAL_ERROR": {
                        throw_error($res["message"], "We couldn't find any accounts with the given credentials");
                        break;
                    }
                }

                break;
            }
        }

        echo $res;

        break;
    }
}
?>
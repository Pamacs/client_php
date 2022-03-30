<?php
foreach ($_POST as $key => $val) {
    echo "Key: ".$key.", Value: $val"." | ";
}

require '../util/req_util.php';
require '../util/throw_error.php';

switch ($_POST['type']) {

    case 'register': {

        echo 'REG B)';
        
        $res = sendReq("auth/register", ReqMethod::POST, false, array(
            'password' => $_POST['password'],
            'register_key' => $_POST['register_key']
        ));
        echo $res;

        break;
    }
    case 'login': {
        echo 'LOG B)';

        break;
    }
}
?>
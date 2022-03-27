<?php
foreach ($_POST as $key => $val) {
    echo "Key: ".$key.", Value: $val"." | ";
}

require '../util/req_util.php';

switch ($_POST['type']) {
    case 'register': {
        echo 'REG B)';
        
        $res = sendReq("ping", ReqMethod::GET, array("nigger" => ":D"), true);
        echo $res['sex'];

        break;
    }
    case 'login': {
        echo 'LOG B)';

        break;
    }
}
?>
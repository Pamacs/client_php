<?php
return array(
    "root" => (stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . "/",
    "backend_url" => "http://127.0.0.1:30144/",
    
    "register" => array(
        "require_invite_code" => true
    )
);
?>
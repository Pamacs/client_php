<?php

$config = require '../config.php';

enum ReqMethod {
    case GET; case POST; case PATCH; case PUT; case DELETE;

    public function getStr() {
        return match($this) {
            ReqMethod::GET => 'GET',
            ReqMethod::POST => 'POST',
            ReqMethod::PATCH => 'PATCH',
            ReqMethod::PUT => 'PUT',
            ReqMethod::DELETE => 'DELETE'
        };
    }
}

function sendReq(string $path, ReqMethod $method, array $query, bool $json) {

    global $config;

    $opts = array('http' => array(
        'method' => $method->getStr(),
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $query
    ));
    $ctx = stream_context_create($opts);
    $res = file_get_contents($config['backend_url'].$path, false, $ctx);

    if ($json) {
        return json_decode($res, true);
    }
    return $res;
}

function asd() {
    echo ":d";
}

?>
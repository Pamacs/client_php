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

function sendReq(string $path, ReqMethod $method, bool $json, array $query = array(), string $bearer = "") {

    global $config;
    require_once 'notifier.php';

    $opts = array(
        'http' => array(
            'ignore_errors' => true,
            'method' => $method->getStr(),
            'header' => array(
                'Content-type: application/x-www-form-urlencoded'
            )
        )
    );

    if ($bearer != "") $opts['http']['header'][] = "Authorization: Bearer {$bearer}";
    if (count($query) != 0) $opts['http']['content'] = http_build_query($query);

    $ctx = stream_context_create($opts);
    $res = file_get_contents($config['backend_url'].$path, false, $ctx);

    if (!$res) {
        throw_error("Backend not accessible", "It's either down or it hasn't been set up correctly.");
    }
    elseif ($json) {
        return json_decode($res, true);
    }

    return $res;
}

?>
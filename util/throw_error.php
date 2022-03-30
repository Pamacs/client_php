<?php

function throw_error(string $error_title, string $error_desc) {

    session_start();
    $_SESSION["error"] = array(
        "title" => $error_title,
        "desc" => $error_desc
    );

    header('Location: /error_page.php');

}

?>
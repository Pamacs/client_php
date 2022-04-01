<?php

function throw_error(string $error_title, string $error_desc) {

    session_start();
    $_SESSION["error"] = array(
        "title" => $error_title,
        "desc" => $error_desc
    );

    header('Location: /error_page.php');

}

function forceful_feedback(string $title, array $desc) {

    session_start();
    $_SESSION["feedback"] = array(
        "title" => $title,
        "desc" => $desc
    );

    header('Location: /forceful_feedback.php');

}

?>
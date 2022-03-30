<?php

session_start();

$error_title = "This is a debug title";
$error_desc = "Something that describes the error.";

if ( isset($_SESSION["error"]["title"]) ) { $error_title = $_SESSION["error"]["title"]; }
if ( isset($_SESSION["error"]["desc"]) ) { $error_desc = $_SESSION["error"]["desc"]; }

/*
Required parameters at post:
    - error_title
    - error_description (can be generated here)
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/error_page.css">
    <title>Error</title>
</head>
<body>
    <div class="error">
        <span class="error_cap">Error</span>
        <?php

        echo '<span class="error_title">'.htmlspecialchars($error_title).'</span>';
        echo '<span class="error_desc">'.htmlspecialchars($error_desc).'</span>';

        unset($_SESSION['error']);
        session_destroy();

        ?>
    </div>
</body>
</html>
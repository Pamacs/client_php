<?php

session_start();

$title = "This is a debug title";
$desc = ["DEBUG"];

if ( isset($_SESSION["feedback"]["title"]) ) { $title = $_SESSION["feedback"]["title"]; }
if ( isset($_SESSION["feedback"]["desc"]) ) { $desc = $_SESSION["feedback"]["desc"]; }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/feedback_page.css">
    <title><?php htmlspecialchars($title); ?></title>
</head>
<body>
    <div>
        <?php

        echo '<span class="title">'.htmlspecialchars($title).'</span>';
        foreach ($desc as $desc_row) {
            echo '<span class="desc">'.htmlspecialchars($desc_row).'</span>';
        }

        unset($_SESSION['feedback']);
        session_destroy();

        ?>
    </div>
</body>
</html>
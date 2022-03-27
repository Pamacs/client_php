<?php

$error_title = "This is a debug title";
$error_desc = "Something that describes the error."
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

        echo '<span class="error_title">'.$error_title.'</span>';
        echo '<span class="error_desc">'.$error_desc.'</span>';

        ?>
    </div>
</body>
</html>
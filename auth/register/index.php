<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/auth.css">
    <title>Pamacs Auth</title>
</head>
<body>
    <form class="auth_form" action="../../handling/auth_handler.php" method="post" autocomplete="off">
        <span class="auth_text">Register</span>
        <input type="hidden" name="type" value="register" />


        <input class="txtfield" type="password" name="password" placeholder="Password">
        <?php
            $config = require '../../config.php';

            if ($config['register']['require_invite_code']) {
                echo '<input class="txtfield" type="text" name="register_key" placeholder="Invite Code">';
            }
            
        ?>
        
        
        <input class="authbtn" type="submit" value="Register">
    </form>
</body>
</html>

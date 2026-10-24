<?php
    // setting cookies
    setcookie('username', 'sid', time() +5, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies&Sessions</title>
</head>
<body>
    <?php
        echo $_COOKIE['username'];
    ?>
</body>
</html>
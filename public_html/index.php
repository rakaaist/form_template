<?php

require '../bootloader.php';

if (is_logged_in()) {
    $h2 = "Welcome {$_SESSION['email']}! Successful login!";
} else {
    $h2 = 'You are not logged in.';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="media/style.css">
</head>
<body class="index_body">
<p><?php print $h2; ?></p>
</body>
</html>
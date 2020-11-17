<?php

require '../bootloader.php';

/**
 * CLIENT SIDE COOKIES
 *
 * $_COOKIE masyvas
 * setcookie request is sent from browser to server
 */
$user_id = $_COOKIE['user_id'] ?? uniqid();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', $user_id, time() + 3600);
setcookie('visits', $visits, time() + 3600);

$h1 = "Hi, this is your ID $user_id";
$h2 = "You visited $visits times";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="media/style.css">
</head>
<body class="index_body">
<h1>LABAS, PENKTADIENI!</h1>
<p><?php print $h1; ?></p>
<p><?php print $h2; ?></p>
<?php //require ROOT . '/core/templates/form.tpl.php'; ?>
<?php //if (isset($error)): ?>
<!--        <p>--><?php //print $error; ?><!--</p>-->
<?php //endif; ?>
</body>
</html>
<?php

require '../bootloader.php';
$nav = nav();

//if (is_logged_in()) {
//    $h2 = "Welcome {$_SESSION['email']} to Accessories Shop!";
//} else {
//    $h2 = 'You are not logged in.';
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="media/style.css">
</head>
<?php require ROOT . '/app/templates/nav.php'; ?>
<body class="index_body">
<main>
    <h1>Welcome to Accessories Shop</h1>
</main>
</body>
</html>
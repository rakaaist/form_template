<?php

use App\App;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

$nav = nav();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="../media/style.css">
</head>
<body>

<?php require ROOT . '/app/templates/nav.php'; ?>

<main>
    <div class="poop-wall">
    </div>
</main>
</body>
</html>
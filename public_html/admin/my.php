<?php

require '../../bootloader.php';

if (!is_logged_in()) {
    header("location: /login.php");
    exit();
}

$nav = nav();

$data = new FileDB(DB_FILE);
$data->load();
$pixels = $data->getRowsWhere('pixels', ['email' => $_SESSION['email']]);

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

        <?php foreach ($pixels as $pixel): ?>
            <span class="pixel" style="
                 <?php print pixel_attr($pixel); ?>">
            </span>
        <?php endforeach; ?>

    </div>
</main>
</body>
</html>
<?php

use App\App;

require '../bootloader.php';

if (App::$session->getUser()) {
    header("location: /index.php");
    exit();
}

$nav = nav();

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'validators' => [
                'validate_field_not_empty',
                'validate_email'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validators' => [
                'validate_field_not_empty'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Login',
            'type' => 'submit',
        ]
    ],
    'validators' => [
        'validate_login'
    ]
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    $form_success = validate_form($form, $clean_inputs);

    if ($form_success) {
        App::$session->login($clean_inputs['email'], $clean_inputs['password']);
        header("location: /admin/add.php");
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="media/style.css">
</head>
<body class="login-background">

<?php require ROOT . '/app/templates/nav.php'; ?>

<main>

    <?php require ROOT . '/core/templates/form.tpl.php'; ?>

</main>
</body>
</html>

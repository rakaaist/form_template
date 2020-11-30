<?php

use App\App;

require '../bootloader.php';

if (is_logged_in()) {
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
                'validate_user_unique'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validators' => [
                'validate_field_not_empty'
            ]
        ],
        'password_repeat' => [
            'label' => 'Repeat password',
            'type' => 'password',
            'validators' => [
                'validate_field_not_empty'
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Register',
            'type' => 'submit',
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ]
    ]
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {

    if (validate_form($form, $clean_inputs)) {
        unset($clean_inputs['password_repeat']);
        App::$db->insertRow('users', $clean_inputs);
        header("location: /login.php");
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
<body class="register-background">

<?php require ROOT . '/app/templates/nav.php'; ?>

<main>

    <?php require ROOT . '/core/templates/form.tpl.php'; ?>

</main>
</body>
</html>
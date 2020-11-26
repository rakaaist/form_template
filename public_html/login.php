<?php

require '../bootloader.php';
$nav = nav();

if (is_logged_in()) {
    header("location: /index.php");
    exit();
}

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
        $_SESSION['email'] = $clean_inputs['email'];
        $_SESSION['password'] = $clean_inputs['password'];
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
<?php require ROOT . '/app/templates/nav.php'; ?>
<body class="login-background">
<main>
    <?php require ROOT . '/core/templates/form.tpl.php'; ?>
</main>
</body>
</html>

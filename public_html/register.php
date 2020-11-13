<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'validators' => [
                'validate_field_not_empty'
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
$message = '';

if ($clean_inputs) {

    if (validate_form($form, $clean_inputs)) {
        unset($clean_inputs['password_repeat']);
        array_to_file($clean_inputs, ROOT . '/app/data/db.json');
        $message = 'Successful registration!';
        var_dump(file_to_array(ROOT . '/app/data/db.json'));
    } else {
        $message = 'Eik nx';
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
<body>
<?php require ROOT . '/core/templates/form.tpl.php'; ?>
<?php if (isset($message)): ?>
    <p><?php print $message; ?></p>
<?php endif; ?>
</body>
</html>
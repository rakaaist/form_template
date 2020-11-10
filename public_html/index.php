<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'

    ],
    'fields' => [
        'email' => [
            'label' => 'Email:',
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty'
            ],
            'placeholder' => 'aiste@gmail.com',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'input-field'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password:',
            'type' => 'password',
            'validators' => [
                'validate_field_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Your password...',
                    'class' => 'input-field'
                ]
            ]
        ]
    ],
    'buttons' => [
        'login' => [
            'title' => 'Login in',
            'type' => 'submit',
            'extra' => [
                'attr' => [
                    'class' => 'btn'
                ]
            ]
        ],
        'clear' => [
            'title' => 'Clear',
            'type' => 'clear',
            'extra' => [
                'attr' => [
                    'class' => 'btn'
                ]
            ]
        ]
    ]
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    validate_form($form, $clean_inputs);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
</head>
<body>
<?php require ROOT . '/core/templates/form.tpl.php'; ?>
</body>
</html>
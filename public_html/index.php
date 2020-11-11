<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'full_name' => [
            'label' => '',
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_full_name'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Vardas ir pavarde',
                ]
            ]
        ],
        'age' => [
            'label' => '',
            'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
                'validate_age'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Amzius',
                ]
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Ar aš normalus?',
            'type' => 'submit',
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
    $sucess = validate_form($form, $clean_inputs);

    if ($sucess) {
        var_dump('success');
    } else {
        var_dump('no success');
    }
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
<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'number_1' => [
            'label' => 'Type number between 100 and 200',
            'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_range' => [
                    'min' => 100,
                    'max' => 200
                ]
            ]
        ],
        'number_2' => [
            'label' => 'Type number between 50 and 100',
            'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_range' => [
                    'min' => 50,
                    'max' => 100
                ]
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Ar skiriu skaičius',
            'type' => 'submit',
        ]
    ]
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    $success = validate_form($form, $clean_inputs);

    if ($success) {
        $conclusion = 'Success!';
        var_dump($conclusion);
    } else {
        $conclusion = 'No success...:(';
        var_dump($conclusion);
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
<?php if (isset($conclusion)): ?>
    <p><?php print $conclusion; ?></p>
<?php endif; ?>
</body>
</html>
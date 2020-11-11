<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
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
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Check password',
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
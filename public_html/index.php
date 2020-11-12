<?php

require '../bootloader.php';

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'head' => [
            'label' => 'Head',
            'type' => 'select',
            'options' => [
                'afro' => 'Afro',
                'asian' => 'Asian',
                'european' => 'European'
            ],
            'value' => 'afro',
            'validators' => [
                'validate_select'
            ]
        ],
        'body' => [
            'label' => 'Body',
            'type' => 'select',
            'options' => [
                'slim' => 'Slim',
                'fat' => 'Fat'
            ],
            'value' => 'slim',
            'validators' => [
                'validate_select'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Build me',
            'type' => 'submit',
        ]
    ],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {

    if (validate_form($form, $clean_inputs)) {
        $body_parts = $clean_inputs;
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
<?php if ($body_parts ?? false): ?>
    <?php foreach ($body_parts as $parts): ?>
        <div class="<?php print $parts; ?> size"></div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
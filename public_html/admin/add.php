<?php

require '../../bootloader.php';
$nav = nav();

if (!is_logged_in()) {
    header("location: /login.php");
    exit();
}

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'coordinate_x' => [
            'label' => '',
            'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
                'validate_coordinate'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Coordinate X'
                ]
            ]
        ],
        'coordinate_y' => [
            'label' => '',
            'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
                'validate_coordinate'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Coordinate Y'
                ]
            ]
        ],
        'colour' => [
            'label' => '',
            'type' => 'select',
            'options' => [
                'black' => 'Black',
                'red' => 'Red',
                'green' => 'Green',
                'blue' => 'Blue',
            ],
            'value' => 'red',
            'validators' => [
                'validate_select'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Upload pixel!',
            'type' => 'submit',
        ]
    ],
    'validators' => [
        'validate_unique_pixel'
    ]
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {

    if (validate_form($form, $clean_inputs)) {
        $data = new FileDB(DB_FILE);
        $data->load();
        $clean_inputs['email'] = $_SESSION['email'];
        $data->insertRow('pixels', $clean_inputs);
        $data->save();
        $message = 'Successful upload of pixel!';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="../media/style.css">
</head>
<body class="add-background">

<?php require ROOT . '/app/templates/nav.php'; ?>

<main>

    <?php require ROOT . '/core/templates/form.tpl.php'; ?>

    <?php if (isset($message)): ?>
        <h3><?php print $message; ?></h3>
    <?php endif; ?>
</main>
</body>
</html>

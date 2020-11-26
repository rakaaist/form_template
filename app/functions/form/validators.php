<?php

/**
 * Function checks whether the user already exists
 *
 * @param $email
 * @param $file_name
 * @return bool
 */
function validate_user_unique($email, &$field)
{
    $db_data = new FileDB(DB_FILE);
    $db_data->load();
    $user_exists = $db_data->getRowWhere('users', ['email' => $email]);

    if ($user_exists) {
        $field['error'] = 'This user already exists';

        return false;
    }

    return true;
}


/**
 * Function checks whether the user has already registered;
 *
 * @param $filtered_input
 * @param $form
 * @return bool
 */
function validate_login($filtered_input, &$form)
{
    $db_data = new FileDB(DB_FILE);
    $db_data->load();
    $login = $db_data->getRowWhere('users', [
        'email' => $filtered_input['email'],
        'password' => $filtered_input['password']
    ]);

    if ($login) {
        return true;
    }

    $form['error'] = 'Password or email is incorrect!';
    return false;
}


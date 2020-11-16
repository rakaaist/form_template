<?php

/**
 * Function checks whether the user already exists
 *
 * @param $email
 * @param $file_name
 * @return bool
 */
function validate_user_unique ($email, &$field) {

        $db_data = file_to_array(DB_FILE);

        foreach($db_data as $user) {
            if ($user['email'] === $email) {
                $field['error'] = 'This user already exists';

                return false;
            }
        }

    return true;
}


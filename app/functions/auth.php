<?php

use App\App;

/**
 * Function checks whether the user has logged in;
 * checks whether user (password and email) exists in database;
 *
 * @return bool
 */
function is_logged_in()
{
    if ($_SESSION) {

        return (bool)App::$db->getRowsWhere('users', [
            'email' => $_SESSION['email'],
            'password' => $_SESSION['password']]);
    }

    return false;
}

/**
 * Function ends the session
 *
 * @param null $redirected
 */
function logout($redirected = null): void
{
    $_SESSION = [];
    session_destroy();

    if ($redirected) {
        header("location: /$redirected");
    }
}



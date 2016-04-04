<?php
/*
 *      Sign-in script.
 *
 */
require_once('__INC_INIT__.php');

if(!empty($_POST)&& (isset($_POST['usr_userName'])) && (isset($_POST['usr_passwd']))) {
    $username = $_POST['usr_userName'];
    $password = $_POST['usr_passwd'];
    $signin = $auth->signin([
        'usr_userName' => $username
        , 'usr_passwd' => $password
    ]);

    if ($signin || $auth->check()) {
        header('Location: ../../');
    }
}

// Send back to landing page
header('Location: ../../../');



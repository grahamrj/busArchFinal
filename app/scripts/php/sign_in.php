<?php
    /*
     *      Sign-in script.
     *
     */
    require_once('__INC_INIT__.php');

    if (!empty($_POST) && (isset($_POST['UserName'])) && (isset($_POST['AcctPass']))) {
        $username = $_POST['UserName'];
        $password = $_POST['AcctPass'];

        var_dump($username . '   ' . $password);
        try {
            $signin = $auth->signin([
                'UserName'   => $username
                , 'AcctPass' => $password
            ]);
        } catch (Exception $error) {
            echo $error->getMessage() . ' ' . $error->getTraceAsString();
        }

        var_dump($auth->check());

        if ($signin || $auth->check()) {
            header('Location: ../../');
        }
//        else
//        {
//            // Send back to landing page
//            header('Location: ../../../');
//        }
    }
    ?>






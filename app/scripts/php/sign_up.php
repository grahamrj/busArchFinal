<?php
    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 2/22/2016
     * Time: 7:52 PM
     */

    require_once('__INC_INIT__.php');

    if (!empty($_POST)) {
        $FName = filter_input(INPUT_POST, 'FName', FILTER_SANITIZE_STRING);
        $LName = filter_input(INPUT_POST, 'LName', FILTER_SANITIZE_STRING);
        $EMail = filter_input(INPUT_POST, 'EMail', FILTER_SANITIZE_EMAIL);
        $Phone = filter_input(INPUT_POST, 'Phone', FILTER_SANITIZE_STRING);
        $UserName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
        $AcctPass = filter_input(INPUT_POST, 'AcctPass');
        $City = filter_input(INPUT_POST, 'City', FILTER_SANITIZE_STRING);
        $State = filter_input(INPUT_POST, 'State', FILTER_SANITIZE_STRING);
        $AdminFlag = filter_input(INPUT_POST, 'AdminFlag', FILTER_SANITIZE_NUMBER_INT);
        $CouncilID = filter_input(INPUT_POST, 'CouncilID', FILTER_SANITIZE_NUMBER_INT);
        $UserRole = filter_input(INPUT_POST, 'UserRole', FILTER_SANITIZE_STRING);

        $validator = new Validator($db, $eHandle);

        $validation = $validator->check($_POST, [
            'FName'     => [
                'required'  => true,
                'minlength' => 2,
                'maxlength' => 50
            ],
            'LName'     => [
                'required'  => true,
                'minlength' => 2,
                'maxlength' => 50
            ],
            'EMail'     => [
                'required'  => true,
                'maxlength' => 50,
                'email'     => true
            ],
            'Phone'     => [
                'required'  => false,
                'maxlength' => 12,
                'phone'     => true
            ],
            'AcctPass'  => [
                'required'  => true,
                'minlength' => 5,
                'maxlength' => 30
            ],
            'UserName'  => [
                'required'  => true,
                'minlength' => 6,
                'maxlength' => 26
            ],
            'City'      => [
                'required'  => true,
                'minlength' => 2,
                'maxlength' => 50
            ],
            'State'     => [
                'required'  => true,
                'minlength' => 2,
                'maxlength' => 2
            ],
            'CouncilID' => [
                'required'  => true,
                'minlength' => 5,
                'maxlength' => 5
            ],
            'UserRole'  => [
                'required'  => true,
                'minlength' => 1,
                'maxlength' => 1
            ],
        ]);

        echo '<pre>', print_r($validation), '</pre>';

        if ($validation->fails()) {
            echo '<pre>', print_r($validation->errors()->all()), '</pre>';
        } else {
            try {
                $created = $auth->create_user_account([
                    'FName'       => $FName
                    , 'LName'     => $LName
                    , 'EMail'     => $EMail
                    , 'AcctPass'  => $AcctPass
                    , 'UserName'  => $UserName
                    , 'City'      => $City
                    , 'State'     => $State
                    , 'AdminFlag' => $AdminFlag
                    , 'CouncilID' => $CouncilID
                ]);

                if ($created) {
                    unset($created);
                    $created = $auth->create_user_role([
                        'UserName' => $UserName
                      , 'CouncilID' => $CouncilID
                      , 'RoleID' => $UserRole
                    ]);

                    if ($created) {
                        header('Location: ../../../');
                    } else {
                        echo 'Something went right, but the other went wrong';
                    }
                } else {
                    echo 'Something went terribly wrong';
                }
            } catch (Exception $error) {
                echo '<pre>', print_r($error->getCode() . ' ' . $error->getMessage() . ' ' . $error->getTraceAsString()), '</pre>';
            }
        }
    }
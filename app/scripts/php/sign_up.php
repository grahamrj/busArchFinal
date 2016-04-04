<?php
    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 2/22/2016
     * Time: 7:52 PM
     */

    require_once('__INC_INIT__.php');

    if(!empty($_POST))
    {
        $u_fName = filter_input(INPUT_POST, 'usr_fName', FILTER_SANITIZE_STRING);
        $u_lName = filter_input(INPUT_POST, 'usr_lName', FILTER_SANITIZE_STRING);
        $u_uName = filter_input(INPUT_POST, 'usr_userName', FILTER_SANITIZE_STRING);
        $u_Role = filter_input(INPUT_POST, 'usr_role', FILTER_SANITIZE_STRING);
        $u_Admin = filter_input(INPUT_POST, 'usr_is_admin', FILTER_SANITIZE_NUMBER_INT);
        $u_Email = filter_input(INPUT_POST, 'usr_email', FILTER_SANITIZE_EMAIL);
        $u_Pass = filter_input(INPUT_POST, 'usr_passwd', FILTER_SANITIZE_STRING);

        $validator = new Validator($db,$eHandle);

        $validation = $validator->check($_POST, [
            'usr_role' => [
                'required' => true,
                'minlength' => 1,
                'maxlength' => 7
            ],
            'usr_fName' => [
                'required' => true,
                'minlength' => 2,
                'maxlength' => 50
            ],
            'usr_lName' => [
                'required' => true,
                'minlength' => 2,
                'maxlength' => 50
            ],
            'usr_userName' => [
                'required' => true,
                'minlength' => 6,
                'maxlength' => 26,
                'unique' => 'cs_user_account'
            ],
            'usr_email' => [
                'required' => true,
                'maxlength'=> 200,
                'unique' => 'cs_user_account',
                'email' => true
            ],
            'usr_passwd' => [
                'required' => true,
                'minlength' => 5,
                'maxlength' => 30
            ],
            'usr_phone' => [
                'required' => true,
                'phone' => true
            ]
        ]);

        echo '<pre>', print_r($validation),'</pre>';

        if($validation->fails())
        {
            echo '<pre>', print_r($validation->errors()->all()), '</pre>';
        }
        else
        {
            $created = $auth->create([
                'usr_role' => $u_Role
                ,'usr_is_admin' => $u_Admin
                ,'usr_fName' => $u_fName
                ,'usr_lName' => $u_lName
                ,'usr_userName' => $u_uName
                ,'usr_email' => $u_Email
                ,'usr_passwd' => $u_Pass
            ]);

            if($created)
            {
                header('Location: ../../../');
            }
        }
    }
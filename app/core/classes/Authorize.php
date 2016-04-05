<?php

    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 2/22/2016
     * Time: 8:33 PM
     */
    class Authorize
    {
        protected $database;

        protected $table = 'useracct';

        protected $hash;

        protected $session = 'user';

        protected $user_rules = ['id' => 'usr_id', 'username' => 'usr_userName', 'first' => 'usr_fName', 'last' => 'usr_lName', 'email' => 'usr_email'];


        public function __construct(Database $database, Hash $hash)
        {
            $this->database = $database;
            $this->hash = $hash;
        }


        /**
         * @param $data
         * @return bool
         */
        public function create_user_account($data)
        {
            //insert user
            if (isset($data['AcctPass'])) {
                $data['AcctPass'] = $this->hash->hashIt($data['AcctPass']);
            }

            return $this->database->table($this->table)->insert($data);
        }


        public function create_user_role($data)
        {
            if (isset($data['UserName'])) {

                $temp = $this->database->table($this->table)->where('UserName', '=', $data['UserName']);

                if ($temp->count()){

                    $temp = $temp->first();
                    unset($data['UserName']);
                    $data['AcctID'] = $temp->AcctID;

                    // DEV ONLY
                    // var_dump($data);
                    // var_dump($temp->AcctID);
                    return $this->database->table('userrole')->insert($data);
                }
            }
            // DEV ONLY
            //var_dump($data);

            return false;
        }


        public function signin($data)
        {
            // Set $user equal to the return of calling 'where' function on this database object.
            // -- Where database user is equal to username entered in field.
            $user = $this->database->table($this->table)->where('UserName', '=', $data['UserName']);

            // If user exists in system
            //var_dump($user->count());
            if ($user->count()) {

                // $user = first (only) instance of user
                //var_dump($user->first());
                $user = $user->first();

                // If the password entered in field ($data['password']) is verified (against the stored hash) --
                // set the userAuthSession, passing in the verified user's id --
                // then return true
                //var_dump($this->hash->hashCheck($data['AcctPass'], $user->AcctPass));
                if ($this->hash->hashCheck($data['AcctPass'], $user->AcctPass)) {
                    $this->database->table($this->table)->updateStatus('1', $data['UserName']);
                    $this->setAuthSession($user);

                    return true;
                }
            }
            // If user does not exist in database return false.
            return false;
        }


        public function signout()
        {
            $this->database->table($this->table)->updateStatus('0', $this->getUserInfo('UserName'));
            unset($_SESSION[$this->session]);
        }


        public function check()
        {
            return isset($_SESSION[$this->session]);
        }


        /**
         * @param $userS
         */
        protected function setAuthSession($user)
        {
            // $tempUser = [$user['usr_id'], $user['usr_userName'], $user['usr_fName'],$user['usr_lName'], $user['usr_email']];

            // Change this to specific user values
            $_SESSION[$this->session] = $user;
        }


        public function getUserInfo($access)
        {
            if (isset($_SESSION[$this->session])) {
                foreach ($_SESSION[$this->session] as $key => $value) {
                    if ($access == $key) {
                        return $value;
                    }
                }
            }
            return false;
        }


    }
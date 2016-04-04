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

    protected $table = 'cs_user_account';

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
    public function create($data)
    {
        //insert user
        if(isset($data['usr_passwd']))
        {
            $data['usr_passwd'] = $this->hash->hashIt($data['usr_passwd']);
        }

        return $this->database->table($this->table)->insert($data);
    }



    public function signin($data)
    {
        // Set $user equal to the return of calling 'where' function on this database object.
        // -- Where database user is equal to username entered in field.
        $user = $this->database->table($this->table)->where('usr_userName', '=', $data['usr_userName']);

        // If user exists in system
        if($user->count())
        {
            // $user = first (only) instance of user
            $user = $user->first();

            // If the password entered in field ($data['password']) is verified (against the stored hash) --
            // set the userAuthSession, passing in the verified user's id --
            // then return true
            if($this->hash->hashCheck($data['usr_passwd'], $user->usr_passwd)){
                $this->database->table($this->table)->updateStatus('usr_login_active', '1', $data['usr_userName']);
                $this->setAuthSession($user);

                return true;
            }
        }
        // If user does not exist in database return false.
        return false;
    }



    public function signout()
    {
        $this->database->table($this->table)->updateStatus('usr_login_active', '0', $this->getUserInfo('usr_userName'));
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
//        $tempUser = [$user['usr_id'], $user['usr_userName'], $user['usr_fName'],$user['usr_lName'], $user['usr_email']];

        // Change this to specific user values
        $_SESSION[$this->session] = $user;
    }



    public function getUserInfo($access)
    {
        if(isset($_SESSION[$this->session])){
            foreach($_SESSION[$this->session] as $key => $value) {
                if($access==$key)
                    return $value;
            }
        }
        return false;
    }



}
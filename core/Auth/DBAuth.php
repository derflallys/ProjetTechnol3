<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/08/17
 * Time: 21:19
 */

namespace core\Auth;

use core\Database\Database;
class DBAuth
{
    private $db ;
    public function __construct(Database $db)
    {
        $this->db =$db;
    }

    public function getUserId()
    {
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }
    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username,$password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE login = ? AND verified = ?',[$username,1],null,true);
        if($user){

                if ($user->password === sha1($password)) {
                    $_SESSION['auth'] = $user->id_user;
                    $_SESSION['username'] = $user->login;
                    return true;
                }

        }
        return false;

    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    public function disconnect()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['username']);


    }
}
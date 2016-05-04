<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 18/04/16
 * Time: 16:14
 */

namespace Phizzle;

// no longer necessary - as DB created in next phase
class UserRepository
{
    private $users = [];

    public function __construct() {
        $member = new User();
        $member->setId(1);
        $member->setUsername('fiona');
        $member->setPassword('delaney');
        $member->setRole(User::ROLE_MEMBER);

        $admin = new User();
        $admin->setId(2);
        $admin->setUsername('admin');
        $admin->setPassword('admin');
        $admin->setRole(User::ROLE_ADMIN);

        // add users to the array
        $this->users[1] = $member;
        $this->users[2] = $admin;
    }

    public function getAll() {

        return $this->users;
    }

    public function getOnebyId($id) {
        if($id == 1 || $id ==2) {
            return $this->users[$id];
        } else {

            return null;
        }
    }

    public function getOneByUsername($username) {

        foreach ($this->users as $user){

            if($user->getUsername() == $username){
                return $user;
            }
        }

        return null; // if we get this far, didn't find matching record
    }

    public function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = $this->getOneByUsername($username);

        // if no record has this username, return FALSE
        if(null == $user){
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        // return whether or not hash of input password matched stored hash
        return password_verify($password, $hashedStoredPassword);
    }
}
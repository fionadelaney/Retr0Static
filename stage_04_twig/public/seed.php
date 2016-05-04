<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 18/04/16
 * Time: 17:27
 */

require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../app/setup.php';

use Phizzle\MainController;

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','vagrant');
define('DB_NAME','retr0static');

$eamon = new User();
$eamon->setUsername('eamon');
$eamon->setPassword('lufc');
$eamon->setRole(User::ROLE_MEMBER);

$dan = new User();
$dan->setUsername('dan');
$dan->setPassword('sambucus');
$dan->setRole(User::ROLE_MEMBER);

$admin= new User();
$admin->setUsername('admin');
$admin->setPassword('admin');
$admin->setRole(User::ROLE_ADMIN);

User::insert($eamon);
User::insert($dan);
User::insert($admin);

$users = User::getAll();
var_dump($users);
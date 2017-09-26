<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 26/09/2017
 * Time: 16:47
 */
require_once 'lib/Database.php';
require 'models/Users.php';
$bl = new Database();
$bl->getPDO();


$user = new Users();
$user->setUsername('toto');
$user->getUsername();
var_dump($user);
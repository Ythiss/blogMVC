<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 26/09/2017
 * Time: 16:17
 */

class Database
{
    private $login = 'root';
    private $passwd = '';
    private $url = 'mysql:host=localhost;dbname=blog';
    private $pdo = false;

    public function getPDO(){

        if($this->pdo === false){
            try {
                $extraParams = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->pdo = new PDO($this->url, $this->login, $this->passwd, $extraParams);
                echo 'blblll';
            } catch (PDOException $e) {
                die("La connexion a échouée" . $e->getLine());
            }
        }
        return $this->pdo;
    }
}
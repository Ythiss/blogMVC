<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 26/09/2017
 * Time: 16:17
 */

class Database
{
    private static $login = 'root';
    private static $passwd = '';
    private static $url = 'mysql:host=localhost;dbname=blog';
    private static $pdo = false;

    public static function getPDO(){

        if(self::$pdo === false){
            try {
                $extraParams = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                self::$pdo = new PDO(self::$url, self::$login, self::$passwd, $extraParams);
            } catch (PDOException $e) {
                die("La connexion a échouée" . $e->getLine());
            }
        }
        return self::$pdo;
    }
}

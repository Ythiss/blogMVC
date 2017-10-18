<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 26/09/2017
 * Time: 16:51
 */
require_once 'Database.php';
class Users extends Database
{
    public static function toConnect($username,$password)
  	{
  		try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM users
  			WHERE username ="' .$username . '"
  			AND password = "'.$password.'"  ');
            return $req->fetch();
        }catch (Exception $e) {
            throw new Exception("Mauvais user ou mot de passe !");
        }
  	}

	// affiche tous les users
	public static function findAllUsers()
	{
	    try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM user');
            return $req->fetchAll();
        }catch (Exception $e) {
            throw new Exception("Erreur ou liste d'user vide.");
        }
	}

	// affiche un user particulier
	public static function viewOne($idUser)
	{
	    try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM user WHERE id ="' .$idUser  . '"');
            return $req->fetch();
        }catch (Exception $e) {
            throw new Exception("Erreur ou utilisateur non trouvé.");
        }
	}


}

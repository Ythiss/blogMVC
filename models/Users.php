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
  		$bdd = Database::getPDO();
  		$req = $bdd->query('SELECT * FROM users
  			WHERE username ="' .$username . '"
  			AND password = "'.$password.'"  ');
  		$reponse = $req->fetchAll();
  		return $reponse ? $reponse : "Erreur connexion";
  	}

	// affiche tous les users
	public static function findAllUsers()
	{
		$bdd = Database::getPDO();
		$req = $bdd->query('SELECT * FROM user');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou liste d'user vide.";
	}

	// affiche un user particulier
	public static function viewOne($idUser)
	{
		$bdd = Database::getPDO();
		$req = $bdd->query('SELECT * FROM user WHERE id ="' .$idUser  . '"');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou utilisateur non trouvé.";
	}


}

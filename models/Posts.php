<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 26/09/2017
 * Time: 16:51
 */
require_once 'Database.php';

class Posts extends Database
{
  // affiche tous les articles par ordre décroissant
  public static function findAllPosts()
	{
		$bdd = Database::getPDO();
		$req = $bdd->query('SELECT * FROM posts ORDER BY publicationDate DESC');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "Erreur connexion";
	}

    /*public static function getAllPosts()
    {
        $posts = Posts::findAllPosts();
        $tab = array();
        foreach ($posts as $key => $content){
            $tab[$key] = $content;
        }
        return $tab;
	}*/

	// affiche les 5 derniers articles par ordre décroissant
	public static function findLastFivePosts()
	{
		$bdd = Database::getPDO();
		$req = $bdd->query('SELECT * FROM posts ORDER BY publicationDate DESC LIMIT 5');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou liste d'user vide.";
	}

	// affiche un seul article
	public static function viewOne($idArticle)
	{
		$bdd = Database::getPDO();
		$req = $bdd->query('SELECT * FROM posts WHERE id ="' .$idArticle  . '"');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou utilisateur non trouvé.";
	}
}

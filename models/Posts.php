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
	    try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM posts ORDER BY publicationDate DESC');
            $reponse = $req->fetchAll();
            return $reponse ? $reponse : "Erreur connexion";
        }catch (Exception $e) {
            var_dump($e->getMessage());
        }
	}


	// affiche les 5 derniers articles par ordre décroissant
    public static function findLastFivePosts()
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM posts ORDER BY publicationDate DESC LIMIT 5');
            $reponse = $req->fetchAll();
            return $reponse ? $reponse : "erreur ou liste d'user vide.";
        }catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

  // insère un article en base
    public static function createPost($title, $content)
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('INSERT INTO posts (title, content) VALUES ("' .$title . '","' .$content . '")');
            $reponse = $req->fetch();
            return $reponse ? $reponse : "L'user n'est pas crée !";
        }catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    // affiche un seul article
    public static function viewOne($idArticle)
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM posts WHERE id ="' .$idArticle  . '"');
            $reponse = $req->fetchAll();
            return $reponse ? $reponse : "erreur ou utilisateur non trouvé.";
        }catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

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
            return $req->fetchAll();
        }catch (Exception $e) {
            throw new Exception("Erreur ou liste vide.");
        }
	}


	// affiche les 5 derniers articles par ordre décroissant
    public static function findLastPosts($number)
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM posts ORDER BY publicationDate DESC LIMIT '.$number.'');
            return $req->fetchAll();
        }catch (Exception $e) {
            $e->getMessage();
        }
    }

  // insère un article en base
    public static function createPost($title, $content, $idSession, $datePublish)
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('INSERT INTO posts (title, content, idAuthor, publicationDate)
                                VALUES ("' .$title . '","' .$content . '","' .$idSession . '","' .$datePublish . '")');
            return $req->fetch();
        }catch (Exception $e) {
            $e->getMessage();
        }
    }

    // affiche un seul article
    public static function viewOne($idArticle)
    {
        try{
            $bdd = Database::getPDO();
            $req = $bdd->query('SELECT * FROM posts WHERE id ="' .$idArticle  . '"');
            return $req->fetch();
        }catch (Exception $e) {
            throw new Exception("Article non trouvé");
        }
    }
}

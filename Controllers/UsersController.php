<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 27/09/2017
 * Time: 10:07
 */

class UsersController
{

    public function connectMe()
    {
        $pdo = Database::getPDO();
        if (empty($_POST['username']) || empty($_POST['psw'])){
            echo 'Erreur : Des champs ne sont pas renseignés !<br>'. PHP_EOL;
        }
        else{
            $prep = $pdo->prepare('SELECT id FROM joueurs WHERE username = ? AND psw = ?');
            $prep->execute(array($_POST['username'], $_POST['psw']));
            $checkUsernamePsw = $prep->fetch();
            $prep->closeCursor();
            if (!$checkUsernamePsw) {
                echo 'Mauvais identifiant ou mot de passe !';
            } else {
                session_start();
                $_SESSION['id'] = $checkUsernamePsw['id'];

                header("Location: ../public/account.php");
            }
        }
    }


    /*public function toConnect()
    {
        $identifiant = '';
        $motDePasse = '';
        $bdd = Database::getPDO();
        $req = $bdd->query('SELECT * FROM user
			WHERE identifiant ="' .$identifiant . '"
			AND mot_de_passe = "'.$motDePasse.'"  ');
        $reponse = $req->fetchAll();
        return $reponse ? $reponse : "Erreur connexion";
    }

    public function connect()
    {
        //On récupère les informations du formulaire
        $identifiant = $_POST['identifiant'];
        $motDePasse = $_POST['motDePasse'];
        //On regarde si l'user existe en base
        $user = UsersController::toConnect($identifiant,$motDePasse);
        //S'il existe on met dans la superglobale SESSION ses informations
        if($user){
            $_SESSION['id_user'] = $user[0]['id_user'];
            $_SESSION['identifiant'] = $user[0]['identifiant']		;
        }
        // Dans tous les cas on redirige sur l'index (pour l'instant)
        header('Location: ./index.php');
    }*/

    static function deconnection(){
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
        header("Location: ./index.php");
    }

    public function findAllUsers()
    {
        $pdo = Database::getPDO();
        $query = $pdo->prepare('SELECT username FROM Users');
        $infos = $query->fetch();
        var_dump($infos);
    }
}
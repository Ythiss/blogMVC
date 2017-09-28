<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 27/09/2017
 * Time: 10:07
 */

 if(!isset($_REQUEST['action']) ){
      $_REQUEST['action'] = 'default';
 }
 $action = $_REQUEST['action'];
 require_once('models/Users.php');

 switch($action){
    case 'connectMe':
      $identifiant = $_POST['identifiant'];
      $motDePasse = $_POST['motDePasse'];

      //On regarde si l'user existe
      $user = Users::toConnect($identifiant,$motDePasse);

      //S'il existe on met dans la SESSION ses informations
      if($user){
        $_SESSION['id_user'] = $user[0]['id_user'];
        $_SESSION['identifiant'] = $user[0]['identifiant']		;
      }
      else {
        echo 'erreur !!';
      }
      header('Location: ./index.php');
    break;

    case 'toDisconnect':{
      session_destroy();
      unset($_SESSION);
      header('Location: ./view/disconnect.php');
      break;
    }

    default:
      header('Location: ./index.php');
      break;
    }

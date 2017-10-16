<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 27/09/2017
 * Time: 10:07
 */

 $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default';
 require_once('./models/Users.php');

 switch($action){
     case 'connectMe':
      $username = $_POST['username'];
      $password = $_POST['password'];

      //On regarde si l'user existe
      $user = Users::toConnect($username,$password);

      //S'il existe on met dans la SESSION ses informations
      if($user){
          $_SESSION['id'] = $user[0]['id'];
          $_SESSION['username'] = $user[0]['username'];
      }
      else {
        echo 'erreur !!';
      }
      header('Location: ./index.php?module=account&action=listAll');
    break;

    case 'toDisconnect':{
      session_destroy();
      unset($_SESSION);
      header('Location: ./index.php');
      break;
    }

    default:
      header('Location: ./index.php');
      break;
    }

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

         if (!empty($_POST['username']) && !empty($_POST['password'])) {

             $username = $_POST['username'];
             $password = $_POST['password'];

             // $data = array();
             // $errors = array();
             // // Si un des champs est vide alors on affiche un msg d'erreur
             // if (empty($_POST['username']) && empty($_POST['password'])) {
             //   $errors['username'] = 'Username is required.';
             //   $errors['password'] = 'Password is required.';
             // }
             // if (!empty($errors)){
             //   $data['success'] = false;
             //   $data['errors'] = $errors;
             // }
             // else{ // Pas d'erreur
             //   $data['success'] = true;
             //   $data['errors'] = false;

             $user = Users::toConnect($username, $password);
             var_dump($user);
             //}
             // retourne valeurs de $data en json
             //json_encode($data);


             //S'il existe on met dans la SESSION ses informations
             if ($user) {
                 $_SESSION['id'] = $user['id'];
                 $_SESSION['username'] = $user['username'];
             } else {
                 echo 'erreur !!';
             }
             header('Location: ./index.php?module=account&action=listAll');
         }else{
             header('Location: ./index.php?module=home&action=home');
         }
    break;

    case 'toDisconnect':{
      session_destroy();
      unset($_SESSION);
      header('Location: ./index.php?module=home&action=home');
      break;
    }

    default:
      header('Location: ./index.php?module=home&action=home');
      break;
    }

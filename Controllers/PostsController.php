<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 27/09/2017
 * Time: 10:07
 */

 $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default';
 require_once('./models/Posts.php');

 switch($action){
     case 'createPost':
      /*$title = $_POST['title'];
      $content = $_POST['content'];

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
      header('Location: ./index.php?module=account');*/
    break;

    case 'listAll':{
      $posts = Posts::findAllPosts();
      $i =0;
        foreach ($posts as $post) {
            $_SESSION['postTitle'] = $post[$i]['title'];
            $_SESSION['postDatePublish'] = $post[$i]['publicationDate'];
      }

      header('Location: ./index.php?module=account&action=listAll');
      break;
    }

    default:
      header('Location: ./index.php');
      break;
    }

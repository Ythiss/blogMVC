<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 27/09/2017
 * Time: 10:07
 */

 $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default';
 require_once('./models/Posts.php');
 require_once('./models/Template.php');

 switch($action){
     case 'publish':
      $title = $_POST['title'];
      $content = $_POST['content'];

      $posts = Posts::createPost($title,$content,$_SESSION['id'],date("Y-m-d H:i:s",time()));

      header('Location: ./index.php?module=home&action=home');
    break;

    case 'home':{
      $posts = Posts::findLastPosts(5);
      Template::addData('posts', $posts);
      Template::show('index');
      break;
    }

     case 'viewPost':
         $post = Posts::viewOne($_GET['id']);
         Template::addData('post', $post);
         Template::show('post');
         break;

    case 'listAll':{
      $posts = Posts::findAllPosts();
      Template::addData('posts', $posts);
      Template::show('account');
      break;
    }

    default:
      header('Location: ./index.php');
      break;
    }

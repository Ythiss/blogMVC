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

      $posts = Posts::createPost($title,$content,$_SESSION['id'],date("Y-m-d",time()));

      header('Location: ./post.php?id="'.$_SESSION['id'].'"');
    break;

    case 'home':{
      $posts = Posts::findLastPosts(5);
      Template::addData('posts', $posts);
      Template::show('index');
      break;
    }

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

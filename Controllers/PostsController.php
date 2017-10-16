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

      $posts = Posts::createPost($title,$content);


      if($posts){
          $_SESSION['id'] = $posts[0]['id'];
          $_SESSION['username'] = $posts[0]['username'];
          $_SESSION['postTitle'] = $posts[0]['title'];
          $_SESSION['postContent'] = $posts[0]['content'];
      }
      else {
        echo 'erreur !!';
      }
      header('Location: ./index.php?module=account&action=listAll');
    break;

    case 'home':{
      $posts = Posts::findLastFivePosts();
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

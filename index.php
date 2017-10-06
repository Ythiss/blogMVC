<?php
session_start();
ob_start();
require_once('view/templates/header.php');
require_once('view/templates/menu.php');


$contents = ob_get_contents();
ob_end_clean();

$module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'home';

switch($module){
    case 'user':
        include("Controllers/UsersController.php");
        break;

    case 'post':
        echo $contents;
        include("view/post.php");
        break;

    case 'account':
        echo $contents;
        include("view/account.php");
        break;

    case 'home':
        echo $contents;
        include("Controllers/PostsController.php");
        break;
}

require_once('view/templates/footer.php');

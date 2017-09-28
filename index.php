<?php
session_start();
ob_start();
require_once('view/templates/header.php');
require_once('view/templates/menu.php');


$contents = ob_get_contents();
ob_end_clean();

if(!isset($_REQUEST['module']) ){
     $_REQUEST['module'] = 'accueil';
}
$module = $_REQUEST['module'];

switch($module){
    case 'accueil':
        echo $contents;
        include("view/index.html");
        break;

    case 'user':
        include("Controllers/UsersController.php");
        break;

    case 'account':
        echo $contents;
        include("view/account.php") ;
        break;



}

require_once('view/templates/footer.php');

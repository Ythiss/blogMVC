<?php
require_once('view/templates/header.php');
require_once('view/templates/menu.php');


if(!isset($_REQUEST['module']) ){
     $_REQUEST['module'] = 'accueil';
}
$module = $_REQUEST['module'];

switch($module){
    case 'accueil':
                 //ob_end_flush();
                include("view/index.php") ;
                break;

     case 'user':
                //ob_end_flush();
                include("Controllers/UsersController.php") ;
                break;

     case 'account':
                 //ob_end_flush();
                include("view/account.php") ;
                break;



}

require_once('view/templates/footer.php');

<?php
require_once('../models/Posts.php');

$posts = Posts::createPost('title', 'blblbllblbl test');
var_dump($posts);
?>
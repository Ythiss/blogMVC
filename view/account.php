<?php
//require_once('./models/Posts.php');
//$posts = Posts::getAllPosts();?>
<style>
    table, tr, th, td{
        padding: 1em 1em;
        border: 1px black solid;
    }
</style>

<div class="container">
    <div class="panel-body">
        <h1>Mon compte</h1>
        <p><u>Username</u> : <?=$_SESSION['username'];?></p>
        <?php //var_dump($posts)?>
        <table>
            <tr>
                <th>Article</th>
                <th>Date parution</th>
            </tr>
            <?php ?>
            <tr>
                <td><?=$_SESSION['postTitle']?></td>
                <td><?=$_SESSION['postDatePublish']?></td>
            </tr>
            <?php ?>
        </table>
    </div>
</div>

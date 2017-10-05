<?php
require_once('./models/Posts.php');
$posts = Posts::findAllPosts();
?>
<style>
    table, tr, th, td{
        padding: 1em 1em;
        border: 1px black solid;
    }
</style>

<div class="container">
    <div class="panel-body">
        <h1>Bienvenue sur votre compte <b><?= $_SESSION['username']?></b> !</h1>

        <table>
            <tr>
                <th>Article publiés</th>
                <th>Date parution</th>
            </tr>
            <tr><?php foreach ($posts as $post) {?>
                <td><?= $post['title'];?></td>
                <td><?= $post['publicationDate'];?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>

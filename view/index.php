<?php
$author = isset($_SESSION['username']) ? $_SESSION['username'] : 'demo';
?>
<style>
    article{
        margin: 1em 0;
        padding: 1.5em 4em;
        background-color: #eeeeee;
    }
</style>
<div class="container">
    <div class="panel-body">
        <h1>Bienvenue sur le blog !</h1>
        <section>
            <h2>Derniers posts publiés :</h2><?php foreach (Template::getData('posts') as $post) {?>
                <article>
                    <h3><?= $post['title'] . ' (Par '.$author.' // le ' . $post['publicationDate'] .')' ?></h3>
                    <p><?= $post['content']?></p>
                    <span><a href="index.php?module=viewPost&action=viewPost&id=<?= $post['id']?>">Voir plus</a></span>
                </article>
            <?php }?>
        </section>

    </div>
</div>

<?php
$post = Template::getData('post');
$author = isset($_SESSION['username']) ? $_SESSION['username'] : 'demo';
?>
<style>
    article{
        padding: 1.5em 4em;
        background-color: #eeeeee;
    }
</style>
<div class="container">
    <div class="panel-body">
        <a href="index.php?module=home&action=home">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <h1>Article</h1>
        <section>
            <article>
                <h3><?= $post['title'] . ' (Par '. $author . ' // ' . $post['publicationDate'] .')' ?></h3>
                <p><?= $post['content']?></p>
            </article>
        </section>
    </div>
</div>

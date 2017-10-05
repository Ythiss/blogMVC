<style>
    article{
        padding: 1.5em 4em;
        background-color: #eeeeee;
    }
</style>
<div class="container">
    <div class="panel-body">
        <h1>Bienvenue sur le blog !</h1>
        <section>
            <h2>Derniers posts publiés :</h2>
            <article>
                <h3><?= $_SESSION['postTitle'] . ' (Par blbl // ' . $_SESSION['postDatePublish'] .')' ?></h3>
                <p>blblblblblbllblblblblbllblblblbl</p>
            </article>
        </section>

    </div>
</div>

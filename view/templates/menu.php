<?php
/**
 * Gestion des erreurs
 *
 * @author Amaïa
 * @version 0.0.1
 *
 * Date: 29/09/2016
 *
 */

?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?module=home&action=home">Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php?module=home&action=home">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if (!empty($_SESSION)) : echo'<li><a href="index.php?module=account&action=listAll">Mon compte</a></li>'; endif;?>
                <?php if (empty($_SESSION)) : echo'<li><a href="#signIn" data-toggle="modal" data-target="#signIn">Connexion</a></li>'; endif;?>
                <?php if (!empty($_SESSION)) : echo'<li><a href="#publish" data-toggle="modal" data-target="#publish">Publier</a></li>'; endif;?>
                <?php if (!empty($_SESSION)) : echo'<li><a href="#signOut" data-toggle="modal" data-target="#signOut">Se déconnecter</a></li>'; endif;?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="signIn" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Connexion</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="index.php?module=user&action=connectMe">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div id="publish" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Publier un article</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="index.php?module=post&action=publish">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Titre de l'aticle</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contenu de l'article</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" placeholder="Content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" class="btn btn-primary">Publier</button>
                            <a href="index.php?module=home&action=home">
                                <button type="button" class="btn btn-danger">Annuler</button>
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<div id="signOut" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" name="signOut" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Déconnexion</h4>
            </div>
            <div class="modal-body">
                <p>Vous allez être déconnecté ! À bientôt ! :)</p>
                <form method="post" action="index.php?module=user&action=toDisconnect">
                    <button type="submit" class="btn btn-default">Déconnexion</button>
                </form>
            </div>
        </div>

    </div>
</div>

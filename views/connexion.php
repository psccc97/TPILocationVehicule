<?php

/*
 * Fichier : view connexion.php
 * Auteur: Pascucci Lino
 * Date: 9.05.2017
 * Version : 1.0
 * Description : contient le formulaire de connexion
*/
?>
<html>
    <?php include 'include/header.php'; ?>
    <body>
        <div class="container">
            <!-- Navigation -->
            <?php include 'include/navBar.php'; ?>
            <form class="form-horizontal" action="controllers/verifConnexion.php" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Connexion</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pseudo">Pseudo</label>  
                        <div class="col-md-4">
                            <input id="pseudo" name="prenom" type="text" placeholder="pseudo" class="form-control input-md" required="" value="Lino">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Password</label>
                        <div class="col-md-4">
                            <input id="password" name="mdp" type="password" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="connexion"></label>
                        <div class="col-md-4">
                            <button id="connexion" name="connexion" class="btn btn-primary">Connexion</button>
                        </div>
                    </div>

                </fieldset>
            </form>            
            <div/>   
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

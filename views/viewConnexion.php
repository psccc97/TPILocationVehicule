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
            <form class="form-horizontal" action="connexion.html" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Connexion</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pseudo">Pseudo</label>  
                        <div class="col-md-4">
                            <input id="pseudo" name="prenom" type="text" placeholder="Prenom" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Password</label>
                        <div class="col-md-4">
                            <input id="password" name="mdp" type="password" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <?php if (isset($msgError)): ?>
                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p class="alert alert-danger" role="alert"><?php echo $msgError; ?></p>
                            </div>

                        </div>
                    <?php endif; ?>
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
            <?php include 'include/footer.php'; ?> 
    </body>
</html>

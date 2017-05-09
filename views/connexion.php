<?php

/*
 * User: lino
 * Date: 27.04.2017
 * Time: 11:03
 * Version : 1.0
 * Description :controleur principale il permet de rediriger dans les différents controleurs
*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <!-- Navigation -->
            <?php include 'include/navBar.php'; ?>
            <form class="form-horizontal" action="logincheck.php" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Connexion</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pseudo">Pseudo</label>  
                        <div class="col-md-4">
                            <input id="pseudo" name="pseudo" type="text" placeholder="pseudo" class="form-control input-md" required="" value="Lino">

                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Password</label>
                        <div class="col-md-4">
                            <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

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

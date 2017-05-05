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
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">WebSiteName</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>                        
                        <li><a href="#">Utilisateur</a></li>                           
                        <li><a href="#">Admin</a></li>                          
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>                                                                                                   
                       <!-- <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->                      
                    </ul>
                </div>
            </nav>
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
    </body>
</html>

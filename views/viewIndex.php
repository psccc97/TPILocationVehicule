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
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">WebSiteName</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Utilisateur<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mes véhicules en location</a>
                                </li>
                                <li>
                                    <a href="#">Mes véhicules reservés</a>
                                </li>
                                <li>
                                    <a href="#"> Mettre en location</a>
                                </li>
                            </ul>
                        </li>                        
                        <li><a href="#">Administrateur</a></li>                          
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>                                                                                                   
                       <!-- <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->                      
                    </ul>
                </div>
            </nav>
            <div class="" ></div>
            <!-- Affichage véhicules -->
            <div class="jumbotron">
                <div class="col-md-7">
                    <!-- Image de la voiture -->
                </div>
                <div class="col-md-5">
                    <!-- Affichage des diférent données sur le véhicle -->
                    <a class="btn btn-default" href="#" role="button"> Détails</a>
                </div>
            </div>
        </div> 
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

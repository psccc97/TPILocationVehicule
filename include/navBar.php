<nav class="navbar navbar-inverse">              
    <div class="container-fluid">
        <div class="navbar-header">            
            <a class="navbar-brand" href="accueil.html">Move@Par</a>
        </div>        
        <ul class="nav navbar-nav">                        
            <li class="active"><a href="accueil.html">Accueil</a></li>
            <?php if (isset($_SESSION['prenom'])) : ?>
                <?php if ($_SESSION['status'] == 0 || $_SESSION['status'] == 1) : ?>
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
                                <a href="louer.html"> Mettre en location</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                endif;
                if ($_SESSION['status'] == 1) :
                    ?>
                    <li><a href="#">Administrateur</a></li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (empty($_SESSION['prenom'])) : ?>
                <li><a href="connexion.html"><span class="glyphicon glyphicon-log-in"></span>Connexion</a></li>
            <?php else : ?>
                <li><span class="navbar-text">Bonjour <?php echo $_SESSION['prenom'] ?></span></li>
                <li><a href="deconnexion.html"><span class="glyphicon glyphicon-log-out"></span>Deconnexion</a></li>                   
                <?php endif; ?>
        </ul>    
    </div>
</nav>


<?php
/*
 * Script : view viewIndex.php
 * Auteur: Pascucci Lino
 * Date: 9.05.2017
 * Version : 1.0
 * Description :Page principale du site
 */

session_start();
?>
<html>
    <?php include 'include/header.php'; ?>
    <body>
        <div class="container">
            <!-- Navigation -->
            <?php include 'include/navBar.php'; ?>
            <legend>Accueil</legend>
            <form class="form-inline" action="#" method="post">

                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-1 col-sm-1">
                            <select class="form-control"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label" for="longitude">Votre longitude :</label>
                        <div class="controls">
                             <input id="longitude" type="number" name="longitude" class="input-small" min="0">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="latitude">Votre latitude :</label>
                        <div class="controls">
                            <input id="latitude" type="number" name="latitude" class="input-small" min="0">                            
                        </div>
                    </div>
                </div>
                    <input type="submit" name="recherche" value="Rechercher" class="btn btn-primary">                                                   
            </form>
            <?php foreach ($vehicules as $vehicule): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <h3><?php echo $vehicule['nomMarque'] ?> <?php echo $vehicule['nomModele'] ?></h3>
                        <img src="img/<?php echo $vehicule['Image'] ?>" class="img-responsive" style="width: 100%; height: auto; display: block;"s>
                        <div class="caption">       
                            <p>Kilométrages : <?php echo $vehicule['nbrKilometrage'] ?></p>
                            <p>Année : <?php echo $vehicule['Annee'] ?></p>
                            <p>Description :<?php echo $vehicule['Description'] ?></p>
                            <p>Disponibilité :<?php echo $vehicule['dateDebut']?> ----> <?php echo $vehicule['dateFin']?></p>
                            
                            <p></p>
                            <p>
                                <a href="details-<?php echo $vehicule['idVehicule'];?>.html" class="btn btn-primary" role="button">Détails</a> 
                                <a href="#" class="btn btn-default" role="button">Réserver</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>        
</body>
<?php include 'include/footer.php'; ?>
</html>

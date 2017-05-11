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

                <section class="row">
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <select class="form-control"></select>
                        </div>
                    </div>                    
                    <input type="submit" name="recherche" value="Rechercher" class="btn btn-primary">                   
                </section>                
            </form>
            <?php foreach ($vehicules as $vehicule): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <h3><?php echo $vehicule['nomMarque'] ?> <?php echo $vehicule['nomModele'] ?></h3>
                        <img src="img/<?php echo $vehicule['Image'] ?>" class="img-responsive">
                        <div class="caption">       
                            <p>Kilométrages : <?php echo $vehicule['nbrKilometrage'] ?></p>
                            <p>Année : <?php echo $vehicule['Annee'] ?></p>
                            <p> Description :<?php echo $vehicule['Description'] ?></p>
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

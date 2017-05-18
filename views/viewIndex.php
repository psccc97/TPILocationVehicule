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
                    <!-- Text input Marque-->
                    <div class="form-group">
                        <label class="controls-label" for="marque">Marque</label>
                        <div class="controls">
                            <select class="form-control" name="marque">
                                <option selected="true" value=""></option>
                                <?php foreach ($marques as $m) : ?>
                                    <option value="<?= $m['idMarque'] ?>"><?= $m['nomMarque'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="controls-label" for="modele">Modèle</label>
                        <div class="controls">
                            <select class="form-control" name="modele">
                                <option selected="true" value=""></option>
                                <?php foreach ($modeles as $mo) : ?>
                                    <option value="<?= $mo['idModele'] ?>"><?= $mo['nomModele'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="controls-label" for="kilometrage">Kilometrage</label>
                        <div class="controls">
                            <select class="form-control" name="kilometrage">
                                <option selected="true" value=""></option>
                                <?php foreach ($kilometrages as $k) : ?>
                                    <option value="<?= $k['idKilometrage'] ?>"><?= $k['nbrKilometrage'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Type -->
                    <div class="form-group">
                        <label class="controls-label" for="type">Type</label>
                        <div class="controls">
                            <select class="form-control" name="type">
                                <option value="" selected="true"></option>
                                <option value="Utilitaire">Utilitaire</option>
                                <option value="Voiture">Voiture</option>
                                <option value="2 roues">2 roues</option>
                            </select>
                        </div>
                    </div>
                    <!-- Categorie -->
                    <div class="form-group">
                        <label class="controls-label" for="categorie">Categorie</label>
                        <div class="controls">
                            <select class="form-control" name="categorie">
                                <option value="" selected="true"></option>
                                <option value="Familiale">Familiale</option>
                                <option value="Citadine">Citadine</option>
                                <option value="Sportive">Sportive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Motorisation -->
                    <div class="form-group">
                        <label class="controls-label" for="motorisation">Motorisation</label>
                        <div class="controls">
                            <select class="form-control" name="motorisation">
                                <option value="" selected="true"></option>
                                <option value="Essence">Essence</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Gaz">Gaz</option>
                                <option value="Hybride">Hybride</option>
                                <option value="Electrique">Electrique</option>
                            </select>
                        </div>
                    </div>

                    <!-- Number input Annee -->
                    <div class="form-group">
                        <label class="controls-label" for="annee"> Année</label>
                        <div class="controls">
                            <input id="annee" name="annee" type="number" placeholder="" class="form-control" min="1900" max="<?php echo date("Y"); ?>">
                        </div>
                    </div>

                    <!-- Number input Volume utile -->
                    <div class="form-group">
                        <label class="controls-label" for="volumeUtile"> Volume utile</label>
                        <div class="controls">
                            <input id="volume" name="volume" type="number" placeholder="" class="form-control" min="0"> m3   
                        </div>
                    </div>

                    <!-- Number input Nombre de place -->
                    <div class="form-group">
                        <label class="controls-label" for="nbrPlace">Nombre de place</label>
                        <div class="controls">
                            <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="form-control" max="9" min="0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Longitude -->
                    <div class="form-group">
                        <label class="control-label" for="longitude">Votre longitude :</label>
                        <div class="controls">
                            <input id="longitude" type="number" name="longitude" class="form-control" min="0" step="any">                            
                        </div>
                    </div>
                    <!-- Latitude -->
                    <div class="form-group">
                        <label class="control-label" for="latitude">Votre latitude :</label>
                        <div class="controls">
                            <input id="latitude" type="number" name="latitude" class="form-control" min="0" step="any">                            
                        </div>
                    </div>

                    <!-- Date input Date début-->
                    <div class="form-group">
                        <label class="control-label" for="dateDebut">Date de début</label>
                        <div class="controls">
                            <input id="dateDebut" name="dateDebut" type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>">

                        </div>
                    </div>

                    <!-- Date input Date fin-->
                    <div class="form-group">
                        <label class="control-label" for="dateFin">Date de Fin</label>
                        <div class="controls">
                            <input id="dateFin" name="dateFin" type="date" placeholder="" class="form-control">

                            <?php if (isset($msgError)): ?>
                                <p class="bg-danger text-danger"><?php echo $msgError; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>        
                </div>

                <input type="submit" name="rechercher" value="Rechercher" class="btn btn-primary">                                                   
            </form>
            <?php if (isset($vehiculesFiltrer)) : ?>
                <?php foreach ($vehiculesFiltrer as $vf) : ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <h3><?php echo $vf['nomMarque'] ?> <?php echo $vf['nomModele'] ?></h3>
                            <img src="img/<?php echo $vf['Image'] ?>" class="img-responsive" style="width: 100%; height: auto; display: block;"s>
                            <div class="caption">       
                                <p>Kilométrages : <?php echo $vf['nbrKilometrage'] ?></p>
                                <p>Année : <?php echo $vf['Annee'] ?></p>
                                <p>Description :<?php echo $vf['Description'] ?></p>
                                <p>Disponibilité :<?php echo $vf['dateDebut'] ?> ----> <?php echo $vf['dateFin'] ?></p>
                                <?php if (isset($resultatDistance)) : ?>
                                    <p>Distance : <?= $resultatDistance[$vf['idVehicule']] ?></p>
                                <?php endif; ?>
                                <p>
                                    <a href="details-<?php echo $vf['idVehicule']; ?>.html" class="btn btn-primary" role="button">Détails</a> 
                                    <a href="#" class="btn btn-default" role="button">Réserver</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
            <?php foreach ($vehicules as $vehicule): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <h3><?php echo $vehicule['nomMarque'] ?> <?php echo $vehicule['nomModele'] ?></h3>
                        <img src="img/<?php echo $vehicule['Image'] ?>" class="img-responsive" style="width: 100%; height: auto; display: block;"s>
                        <div class="caption">       
                            <p>Kilométrages : <?php echo $vehicule['nbrKilometrage'] ?></p>
                            <p>Année : <?php echo $vehicule['Annee'] ?></p>
                            <p>Description :<?php echo $vehicule['Description'] ?></p>
                            <p>Disponibilité :<?php echo $vehicule['dateDebut'] ?> ----> <?php echo $vehicule['dateFin'] ?></p>
                            <?php if (isset($resultatDistance)) : ?>
                                <p>Distance : <?= $resultatDistance[$vehicule['idVehicule']] ?></p>
                            <?php endif; ?>
                            <p></p>
                            <p>
                                <a href="details-<?php echo $vehicule['idVehicule']; ?>.html" class="btn btn-primary" role="button">Détails</a> 
                                <a href="#" class="btn btn-default" role="button">Réserver</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>        
</body>
<?php include 'include/footer.php'; ?>
</html>

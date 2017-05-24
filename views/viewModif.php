<!DOCTYPE html>
<html>
    <?php   
    include 'include/header.php'; 
    ?>    
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php include 'include/navBar.php'; ?>
            <form class="form-horizontal" action="modificaton.html" method="post" enctype="multipart/form-data">
                <fieldset>                  
                    <!-- Form Name -->
                    <legend>Modifier un véhicule</legend>

                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="marque">Marque</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="marque" name="marque" class="form-control input-large" required="">
                                <?php foreach ($marques as $m) :?>
                                <?php if($m['idMarque'] == $vehicule['idMarque']): ?>
                                <option selected="true" value="<?php echo $m['idMarque'] ?>"><?= $m['nomMarque']?></option>
                                <?php else : ?>
                                <option value="<?= $m['idMarque']?>"><?= $m['nomMarque'] ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input Modèle-->
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="modele">Modèle</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="modele" name="modele" class="form-control input-md" required="">
                                <?php foreach ($modeles as $mo) :?>
                                <?php if($mo['idModele'] == $vehicule['idModele']): ?>
                                <option selected="true" value="<?php echo $mo['idModele'] ?>"><?= $mo['nomModele']?></option>
                                <?php else : ?>
                                <option value="<?= $mo['idModele']?>"><?= $mo['nomModele'] ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Number input Année-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="annee">Année</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="annee" name="annee" type="number" placeholder="" class="form-control input-md" min="1900" max="<?php echo date("Y"); ?>" value="<?php echo $vehicule['Annee'];?>">

                            </div>
                        </div>                        

                        <!-- Select Basic Catégorie -->
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="categorie">Catégorie</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="categorie" name="categorie" class="form-control input-md" required>
                                        <option value="Familiale" <?= ($vehicule['Categorie']=='Familiale') ? 'selected':'' ?>>Familiale</option>
                                        <option value="Citadine" <?= ($vehicule['Categorie']=='Citadine') ? 'selected':'' ?>><?php echo $vehicule['Categorie']; ?></option>
                                        <option value="Sportive" <?= ($vehicule['Categorie']=='Sportive') ? 'selected':'' ?>>Sportive</option>                                    
                                </select>
                            </div>
                        </div>

                        <!-- Number input Nombre de places-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="nbrPlace">Nombre de places</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="nbrPalce" name="nbrPlace" type="number" placeholder="" class="form-control input-md" max="9" min="0" value="<?php echo $vehicule['nbrPlace']?>">

                            </div>
                        </div>                        

                        <!-- Number input Volume utile-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="volume">Volume utile</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="volume" name="volume" type="number" placeholder="" class="form-control input-md" min="0" value="<?php echo $vehicule['volumeUtile'] ?>"> m3
                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <?php foreach ($dispos as $d) :?>
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-4" for="dateDebut">Date de début</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="dateDebut" value="<?php echo $d['dateDebut'] ?>" name="dateDebut" type="date" class="form-control input-md" required min="<?php echo $d['dateDebut'] ?>">

                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-4" for="dateFin">Date de fin</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="dateFin" name="dateFin" type="date" value="<?php echo $d['dateFin']?>" placeholder="" class="form-control input-md" required>

                                <?php if (isset($msgError)): ?>
                                    <p class="bg-danger text-danger"><?php echo $msgError; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-md-6 col-xs-6">

                        <!-- Textarea Description-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="description">Description</label>
                            </div>
                            <div class="controls col-md-4">                    
                                <textarea id="description" class="form-control" name="description"><?php echo $vehicule['Description']?></textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="motorisation">Motorisation</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="motorisation" name="motorisation" class="form-control input-md" required>
                                        <option value="Essence" <?= ($vehicule['Motorisation'] == 'Essence') ? 'selected' : '' ?>>Essence</option>
                                        <option value="Diesel" <?= ($vehicule['Motorisation'] == 'Diesel') ? 'selected' : '' ?>>Diesel</option>
                                        <option value="Gaz" <?= ($vehicule['Motorisation'] == 'Gaz') ? 'selected' : '' ?>>>Gaz</option>
                                        <option value="Hybride" <?= ($vehicule['Motorisation'] == 'Hybride') ? 'selected' : '' ?>>Hybride</option>
                                        <option value="Electrique" <?= ($vehicule['Motorisation'] == 'Electrique') ? 'selected' : '' ?>>Electrique</option>                                      
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="kilometrage">Kilométrage</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="kilometrage" name="kilometrage" class="form-control input-md">
                                <?php foreach ($kilometrages as $k) :?>
                                <?php if($k['idKilometrage'] == $vehicule['idKilometrage']): ?>
                                <option selected="true" value="<?php echo $k['idKilometrage'] ?>"><?= $k['nbrKilometrage']?></option>
                                <?php else : ?>
                                <option value="<?= $k['idKilometrage']?>"><?= $k['nbrKilometrage'] ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Type-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="type">Type</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="type" name="type" class="form-control input-md">
                                        <option value="Utilitaire" <?= ($vehicule['Type']=='Utilitaire') ? 'selected': '' ?>>Utilitaire</option>
                                        <option value="Voiture" <?= ($vehicule['Type']=='Voiture') ? 'selected': '' ?>>Voiture</option>
                                        <option value="2 roues" <?= ($vehicule['Type']=='2 roues') ? 'selected': '' ?>>2 roues</option>                                    
                                </select>
                            </div>
                        </div>
                        
                        <!-- Input Number Latitude--> 
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="latitude">Latitude</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="latitude" name="latitude" class="form-control input-md" type="number" required="" min="0" step="any" value="<?php echo $vehicule['Latitude'] ?>">
                                
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="control-label col-md-4">
                                <b><a href="https://www.coordonnees-gps.fr/" class="text-primary" target="_blank"><p class="bg-info text-info">Trouver votre longitude latitude ici</p></a></b>
                            </div>
                        </div>
                        
                        
                        
                        <!-- Input Number Longitude--> 
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="longitude">Longitude</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="longitude" name="longitude" class="form-control input-md" type="number" required="" min="0" step="any" value="<?= $vehicule['Longitude'] ?>">
                            </div>
                            
                        </div>
                        
                        <!-- File Button Image--> 
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="image">Image</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="image" name="image" accept="image/*" class="input-file" type="file"><span><?php echo substr($vehicule['Image'], 13); ?></span>
                                <img src="img/<?= $vehicule['Image'] ?>" alt="image not found" class="img-responsive"><input type="hidden" name="nomAncienneImage" value="<?= $vehicule['Image'] ?>">
                                <?php if(isset($msgErrorFile)) :?>
                                <p class="bg-danger text-danger"><?= $msgErrorFile ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!-- Button Enregistrer et Annuler-->
                    <div class="form-group">                        
                        <div class="col-md-4">
                            <input type="hidden" name="idVehicule" value="<?php echo $vehicule['idVehicule'] ?>">
                            <button id="modifier" name="modifier" class="btn btn-success">Modifier</button>
                            <button id="annuler" name="annuler" class="btn btn-default">Annuler</button>
                        </div>
                    </div>                   
                </fieldset>
            </form>
        </div>
    </body>
    <?php include 'include/footer.php'; ?>
</html>

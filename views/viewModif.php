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
                    
                    <?php 
                        var_dump($vehicule);
                    ?>
                    <!-- Form Name -->
                    <legend>Modifier un véhicule</legend>

                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="control-group">
                            <label class="control-label" for="marque">Marque</label>
                            <div class="controls">
                                <select id="marque" name="marque" class="input-large" required="">
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
                        <div class="control-group">
                            <label class="control-label" for="modele">Modèle</label>
                            <div class="controls">
                                <select id="modele" name="modele" class="input-large" required="">
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
                        <div class="control-group">
                            <label class="control-label" for="annee">Année</label>
                            <div class="controls">
                                <input id="annee" name="annee" type="number" placeholder="" class="input-large" min="1900" max="<?php echo date("Y"); ?>" value="<?php echo $vehicule['Annee'];?>">

                            </div>
                        </div>                        

                        <!-- Select Basic Catégorie -->
                        <div class="control-group">
                            <label class="control-label" for="categorie">Catégorie</label>
                            <div class="controls">
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <?php if($vehicule['Categorie'] == 'Citadine'):?>
                                        <option value="Familiale">Familiale</option>
                                        <option value="Citadine" selected="true"><?php echo $vehicule['Categorie']; ?></option>
                                        <option value="Sportive">Sportive</option>                                    
                                    <?php elseif($vehicule['Categorie'] == "Familiale") :?>
                                        <option value="Familiale" selected="true"><?php echo $vehicule['Categorie']; ?></option>
                                        <option value="Citadine">Citadine</option>
                                        <option value="Sportive">Sportive</option>                                    
                                    <?php elseif($vehicule['Categorie'] == "Sportive") :?>
                                        <option value="Familiale">Familiale</option>
                                        <option value="Citadine">Citadine</option>
                                        <option value="Sportive" selected="true"><?php echo $vehicule['Categorie'] ?></option>
                                        <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Number input Nombre de place-->
                        <div class="control-group">
                            <label class="control-label" for="nbrPlace">Nombre de place</label>
                            <div class="controls">
                                <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="input-large" max="9" min="0" value="<?php echo $vehicule['nbrPlace']?>">

                            </div>
                        </div>                        

                        <!-- Number input Volume utile-->
                        <div class="control-group">
                            <label class="control-label" for="volume">Volume utile</label>
                            <div class="controls">
                                <input id="volume" name="volume" type="number" placeholder="" class="input-large" value="<?php echo $vehicule['volumeUtile'] ?>"> m3

                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <div class="control-group">
                            <label class="control-label" for="dateDebut">Date de début</label>
                            <div class="controls">
                                <input id="dateDebut" value="<?php echo $vehicule['dateDebut'] ?>" name="dateDebut" type="date" class="input-large" required min="<?php echo $vehicule['dateDebut'] ?>">

                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="control-group">
                            <label class="control-label" for="dateFin">Date de Fin</label>
                            <div class="controls">
                                <input id="dateFin" name="dateFin" type="date" value="<?php echo $vehicule['dateFin']?>" placeholder="" class="input-large" required>

                                <?php if (isset($msgError)): ?>
                                    <p class="bg-danger text-danger"><?php echo $msgError; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-6">

                        <!-- Textarea Description-->
                        <div class="control-group">
                            <label class="control-label" for="description">Description</label>
                            <div class="controls">                     
                                <textarea id="description" name="description"><?php echo $vehicule['Description']?></textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="control-group">
                            <label class="control-label" for="motorisation">Motorisation</label>
                            <div class="controls">
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <?php if($vehicule['Motorisation'] == 'Essence') :?>
                                        <option value="Essence" selected="true"><?php echo  $vehicule['Motorisation']?></option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>                                    
                                    <?php elseif($vehicule['Motorisation'] == 'Diesel') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel" selected="true"><?php echo $vehicule['Motorisation']?></option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>                                    
                                    <?php elseif($vehicule['Motorisation'] == 'Gaz') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz" selected="true"><?php echo $vehicule['Motorisation']?></option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>                                    
                                    <?php elseif($vehicule['Motorisation'] == 'Hybride') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride" selected="true"><?php echo $vehicule['Motorisation']?></option>
                                        <option value="Electrique">Electrique</option>                                    
                                    <?php elseif($vehicule['Motorisation'] == 'Electrique') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique" selected="true"><?php echo $vehicule['Motorisation']?></option>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                        <div class="control-group">
                            <label class="control-label" for="kilometrage">Kilométrage</label>
                            <div class="controls">
                                <select id="kilometrage" name="kilometrage" class="input-large">
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
                        <div class="control-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls">
                                <select id="type" name="type" class="input-large">
                                    <?php if($vehicule['Type'] == 'Utilitaire'): ?>
                                        <option value="Utilitaire" selected="true"><?php echo $vehicule['Type']?></option>
                                        <option value="Voiture">Voiture</option>
                                        <option value="2 roues">2 roues</option>                                    
                                    <?php elseif($vehicule['Type'] == 'Voiture'): ?>
                                        <option value="Utilitaire">Utilitaire</option>
                                        <option value="Voiture" selected="true"><?php echo $vehicule['Type']?></option>
                                        <option value="2 roues">2 roues</option>                                    
                                    <?php elseif($vehicule['Type'] == '2 roues'): ?>
                                        <option value="Utilitaire">Utilitaire</option>
                                        <option value="Voiture">Voiture</option>
                                        <option value="2 roues" selected="true"><?php echo $vehicule['Type']?></option>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>

                        <!-- File Button Image--> 
                        <div class="control-group">
                            <label class="control-label" for="image">Image</label>
                            <div class="controls">
                                <input id="image" name="image" accept="image/*" class="input-file" type="file" required><span><?php echo substr($vehicule['Image'], 13); ?></span>
                                <img src="img/<?= $vehicule['Image'] ?>" alt="image not found" class="img-responsive"><input type="hidden" name="nomAncienneImage" value="<?= $vehicule['Image'] ?>">
                                <?php if(isset($msgErrorFile)) :?>
                                <p class="bg-danger text-danger"><?= $msgErrorFile ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!-- Button Enregistrer et Annuler-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="enregistrer"></label>
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

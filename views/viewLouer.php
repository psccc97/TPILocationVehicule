<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    include 'include/header.php';
    $i=0;
    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Navigation -->

        <div class="container">
            <?php include 'include/navBar.php'; ?>

            <form class="form-horizontal" action="louer.html" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Mettre en location un véhicule</legend>

                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="control-group">
                            <label class="control-label" for="marque">Marque</label>
                            <div class="controls">
                                <select name="marque" required="">                                    
                                    <?php 
                                        foreach ($marques as $ma) {
                                        if ($ma['idMarque'] == $idMarque) {
                                            echo '<option selected="true" value="' . $ma['idMarque'] . '">' . $ma['nomMarque'] . '</option>';
                                        } else {
                                            echo '<option value="' . $ma['idMarque'] . '">' . $ma['nomMarque'] . '</option>';
                                        }
                                    }
                                    ?> 
                                </select>


                            </div>
                        </div>

                        <!-- Text input Modèle-->
                        <div class="control-group">
                            <label class="control-label" for="modele">Modèle</label>
                            <div class="controls">
                                <select name="modele" required="">                                    
                                    <?php foreach ($modeles as $m) :?>
                                        <?php if ($m['idModele'] == $idModele): ?>
                                        <option selected="true" value="<?php echo $m['idModele']?>"><?php echo $m['nomModele'] ?></option>
                                        <?php else :?>
                                            <option value="<?php echo $m['idModele']?>"><?php echo $m['nomModele']?></option>;
                                        <?php endif ?>
                                    
                                    <?php endforeach;?> 
                                </select>

                            </div>
                        </div>

                        <!-- Number input Année-->
                        <div class="control-group">
                            <label class="control-label" for="annee">Année</label>
                            <div class="controls">
                                <input id="annee" name="annee" type="number" placeholder="" class="input-large" min="1900" max="<?php echo date("Y"); ?>" value="<?php if(isset($annee)){echo $annee;} ?>">

                            </div>
                        </div>                        

                        <!-- Select Basic Catégorie -->
                        <div class="control-group">
                            <label class="control-label" for="categorie">Catégorie</label>
                            <div class="controls">
                                
                                    <?php if(isset($categorie) && $categorie == "Familiale") : ?> 
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <option value="Familiale" selected="true">Familiale</option>
                                    <option value="Citadine">Citadine</option>
                                    <option value="Sportive">Sportive</option>
                                </select>
                                    
                                    <?php elseif(isset($categorie) && $categorie == "Citadine") : ?>  
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <option value="Familiale">Familiale</option>
                                    <option value="Citadine" selected="true">Citadine</option>
                                    <option value="Sportive">Sportive</option>
                                </select>
                                    <?php elseif(isset($categorie) && $categorie == "Sportive") : ?>
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <option value="Familiale">Familiale</option>
                                    <option value="Citadine">Citadine</option>
                                    <option value="Sportive" selected="true">Sportive</option>
                                </select>
                                    <?php else : ?>
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <option value="Familiale">Familiale</option>
                                    <option value="Citadine">Citadine</option>
                                    <option value="Sportive">Sportive</option>
                                </select>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Number input Nombre de place-->
                        <div class="control-group">
                            <label class="control-label" for="nbrPlace">Nombre de place</label>
                            <div class="controls">
                                <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="input-large" max="9" min="0" value="<?php if(isset($nbrPlace)){echo $nbrPlace;} ?>">

                            </div>
                        </div>                        

                        <!-- Number input Volume utile-->
                        <div class="control-group">
                            <label class="control-label" for="volume">Volume utile</label>
                            <div class="controls">
                                <input id="volume" name="volume" type="number" placeholder="" class="input-large" value="<?php if(isset($volumeUtile)){echo $volumeUtile;} ?>"> m3

                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <div class="control-group">
                            <label class="control-label" for="dateDebut">Date de début</label>
                            <div class="controls">
                                <input id="dateDebut" name="dateDebut" type="date" class="input-large" required min="<?php echo date("Y-m-d"); ?>">

                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="control-group">
                            <label class="control-label" for="dateFin">Date de Fin</label>
                            <div class="controls">
                                <input id="dateFin" name="dateFin" type="date" placeholder="" class="input-large" required>

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
                                <textarea id="description" name="description"><?php if(isset($description)){echo $description;} ?></textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="control-group">
                            <label class="control-label" for="motorisation">Motorisation</label>
                            <div class="controls">
                                                                    
                                <?php if (isset($motorisation) && $motorisation == "Essence") :?>
                                    <select id="motorisation" name="motorisation" class="input-large" required>
                                        <option value="Essence" selected="true">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>
                                    </select>
                                    <?php elseif(isset($motorisation) && $motorisation == "Diesel") :?>
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel" selected="true">Diesel</option>
                                    <option value="Gaz">Gaz</option>
                                    <option value="Hybride">Hybride</option>
                                    <option value="Electrique">Electrique</option>
                                </select>
                                    <?php 
                                    elseif(isset($motorisation)&& $motorisation == "Gaz") :?>
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gaz" selected="true">Gaz</option>
                                    <option value="Hybride">Hybride</option>
                                    <option value="Electrique">Electrique</option>
                                </select>
                                    <?php  
                                    elseif(isset($motorisation)&& $motorisation == "Hybride") :?>
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gaz" selected="true">Gaz</option>
                                    <option value="Hybride">Hybride</option>
                                    <option value="Electrique">Electrique</option>
                                </select>
                                    <?php 
                                    elseif(isset($motorisation)&& $motorisation == "Electrique") :?>
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gaz">Gaz</option>
                                    <option value="Hybride">Hybride</option>
                                    <option value="Electrique" selected="true">Electrique</option>
                                </select>
                                    <?php else : ?>
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gaz">Gaz</option>
                                    <option value="Hybride">Hybride</option>
                                    <option value="Electrique">Electrique</option>
                                </select>
                                    <?php endif; ?>
                                
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                        <div class="control-group">
                            <label class="control-label" for="kilometrage">Kilométrage</label>
                            <div class="controls">
                                <select id="kilometrage" name="kilometrage" class="input-large" required>
                                    <?php foreach ($kilometrages as $k) : ?>
                                    <?php if($k['idKilometrage'] == $idKilometrage): ?>
                                    <option selected="true" value="<?php echo $k['idKilometrage']?>"><?php echo $k['nbrKilometrage'] ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $k['idKilometrage']; ?>"><?php echo $k['nbrKilometrage']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Type-->
                        <div class="control-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls">
                                
                                    <?php if(isset($type) && $type == "Utilitaire") :?>
                                <select id="type" name="type" class="input-large">
                                    <option value="Utilitaire" selected="true">Utilitaire</option>
                                    <option value="Voiture">Voiture</option>
                                    <option value="2 roues">2 roues</option>
                                </select>                                    
                                    <?php elseif(isset($type) && $type == "Voiture") :?>                                                                        
                                <select id="type" name="type" class="input-large">
                                    <option value="Utilitaire">Utilitaire</option>
                                    <option value="Voiture" selected="true">Voiture</option>
                                    <option value="2 roues">2 roues</option>
                                </select>                                    
                                    <?php elseif(isset($type) && $type == "2 roues") :?>
                                <select id="type" name="type" class="input-large">
                                    <option value="Utilitaire">Utilitaire</option>
                                    <option value="Voiture">Voiture</option>
                                    <option value="2 roues" selected="true">2 roues</option>
                                </select>
                                    <?php else: ?>
                                <select id="type" name="type" class="input-large">
                                    <option value="Utilitaire">Utilitaire</option>
                                    <option value="Voiture">Voiture</option>
                                    <option value="2 roues">2 roues</option>
                                </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Input Number Longitude--> 
                        <div class="control-group">
                            <label class="control-label" for="longitude">Longitude</label>
                            <div class="controls">
                                <input id="longitude" name="longitude" type="number" required="" min="0" step="any" value="<?php if(isset($longitude)){echo $longitude;} ?>">
                            </div>
                            
                        </div>
                        
                        <!-- Input Number Latitude--> 
                        <div class="control-group">
                            <label class="control-label" for="latitude">Latitude</label>
                            <div class="controls">
                                <input id="latitude" name="latitude" type="number" required="" min="0" step="any" value="<?php if(isset($latitude)){echo $latitude;} ?>">
                                
                            </div>
                            
                        </div>
                        
                        <!-- File Button Image--> 
                        <div class="control-group">
                            <label class="control-label" for="image">Image</label>
                            <div class="controls">
                                <input id="image" name="image" accept="image/*" class="input-file" type="file" required>
                                <?php if(isset($msgErrorFile)): ?>
                                <p class="bg-danger text-danger"><?= $msgErrorFile ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!-- Button Enregistrer-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="enregistrer"></label>
                        <div class="col-md-4">
                            <button id="enregistrer" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    include 'include/header.php';    
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
                    <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="marque">Marque *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select name="marque" required="" class="form-control input-md">                                    
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
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="modele">Modèle *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select name="modele" required="" class="form-control input-md">                                    
                                    <?php foreach ($modeles as $m) : ?>
                                        <?php if ($m['idModele'] == $idModele): ?>
                                            <option selected="true" value="<?php echo $m['idModele'] ?>"><?php echo $m['nomModele'] ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $m['idModele'] ?>"><?php echo $m['nomModele'] ?></option>;
                                        <?php endif ?>

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
                                <input id="annee" name="annee" type="number" placeholder="" class="form-control input-md" min="1900" max="<?php echo date("Y"); ?>" value="<?php if (isset($annee)) {echo $annee;}?>">

                            </div>
                        </div>                        

                        <!-- Select Basic Catégorie -->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-3" for="categorie">Catégorie *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="categorie" name="categorie" class="form-control input-md" required>
                                        <option value="Familiale" <?= (isset($categorie) && $categorie=="Familiale") ? 'selected': '' ?>>Familiale</option>
                                        <option value="Citadine" <?= (isset($categorie) && $categorie=="Citadine") ? 'selected': '' ?>>Citadine</option>
                                        <option value="Sportive" <?= (isset($categorie) && $categorie=="Sportive") ? 'selected': '' ?>>Sportive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Number input Nombre de place-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-4" for="nbrPlace">Nombre de place</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="form-control input-md" max="9" min="0" value="<?php if (isset($nbrPlace)) {echo $nbrPlace;}?>">

                            </div>
                        </div>                        

                        <!-- Number input Volume utile-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-4" for="volume">Volume utile</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="volume" name="volume" type="number" placeholder="" class="form-control input-md" min="0" value="<?php if (isset($volumeUtile)) {echo $volumeUtile;}?>"> m3

                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-md-4" for="dateDebut">Date de début *</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="dateDebut" name="dateDebut" type="date" class="form-control input-md" required min="<?php echo date("Y-m-d"); ?>">
                                
                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-4" for="dateFin">Date de fin *</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="dateFin" name="dateFin" type="date" placeholder="" class="form-control input-md" required>

                                <?php if (isset($msgError)): ?>
                                    <p class="bg-danger text-danger"><?php echo $msgError; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-6">

                        <!-- Textarea Description-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="description">Description</label>
                            </div>
                            <div class="controls col-md-4">                
                                <textarea id="description" name="description" class="form-control input-md"><?php if (isset($description)) {echo $description;}?></textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-3" for="motorisation">Motorisation *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="motorisation" name="motorisation" class="form-control input-md" required>
                                    <option value="Essence" <?= (isset($motorisation) && $motorisation == "Essence") ? 'selected' : '' ?> >Essence</option>
                                    <option value="Diesel" <?= (isset($motorisation) && $motorisation == "Diesel") ? 'selected' : '' ?> >Diesel</option>
                                    <option value="Gaz" <?= (isset($motorisation) && $motorisation == "Gaz") ? 'selected' : '' ?> >Gaz</option>
                                    <option value="Hybride" <?= (isset($motorisation) && $motorisation == "Hybride") ? 'selected' : '' ?> >Hybride</option>
                                    <option value="Electrique" <?= (isset($motorisation) && $motorisation == "Electrique") ? 'selected' : '' ?> >Electrique</option>
                                </select>                                
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-3" for="kilometrage">Kilométrages *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="kilometrage" name="kilometrage" class="form-control input-md" required>
                                <?php foreach ($kilometrages as $k) : ?>
                                    <?php if ($k['idKilometrage'] == $idKilometrage): ?>
                                            <option selected="true" value="<?php echo $k['idKilometrage'] ?>"><?php echo $k['nbrKilometrage'] ?></option>
                                    <?php else : ?>
                                            <option value="<?php echo $k['idKilometrage']; ?>"><?php echo $k['nbrKilometrage']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Type-->
                        <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="type">Type *</label>
                            </div>
                            <div class="controls col-md-4">
                                <select id="type" name="type" class="form-control input-md">
                                    <option value="Utilitaire" <?= (isset($type) && $type == "Utilitaire") ? 'selected' : '' ?>>Utilitaire</option>
                                    <option value="Voiture" <?= (isset($type) && $type == "Voiture") ? 'selected' : '' ?>>Voiture</option>
                                    <option value="2 roues" <?= (isset($type) && $type == "2 roues") ? 'selected' : '' ?>>2 roues</option>
                                </select>                                     
                            </div>
                        </div>

                        <!-- Input Number Longitude--> 
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-3" for="longitude">Longitude *</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="longitude" name="longitude" class="form-control input-md" type="number" required="" min="0" step="any" value="<?php if (isset($longitude)) {echo $longitude;}?>">
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="control-label col-md-4">
                                <b><a href="https://www.coordonnees-gps.fr/" class="text-primary"><p class="bg-info text-info">Trouver votre longitude latitude ici</p></a></b>
                            </div>
                        </div>
                        
                        <!-- Input Number Latitude--> 
                       <div class="form-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="latitude">Latitude *</label>
                            </div>
                            <div class="controls col-md-4">
                                <input id="latitude" name="latitude" class="form-control input-md" type="number" required="" min="0" step="any" value="<?php if (isset($latitude)) {echo $latitude;}?>">

                            </div>

                        </div>

                        <!-- File Button Image--> 
                        <div class="control-group">
                            <div class="row">
                            <label class="control-label col-md-2" for="image">Image *</label>
                            </div>
                            <div class="controls col-md-8">
                                <input id="image" name="image" accept="image/*" class="input-file" type="file" required>
                                <?php if (isset($msgErrorFile)): ?>
                                    <p class="bg-danger text-danger"><?= $msgErrorFile ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!-- Button Enregistrer-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="enregistrer"></label>
                        <div class="col-md-4">
                            <button id="enregistrer" name="enregistrer" class="btn btn-primary">Enregistrer</button> <br/>                            
                        </div>
                    </div>
                    
               </div>
                </fieldset>
            </form>

        </div>
<?php include 'include/footer.php'; ?>
    </body>
</html>

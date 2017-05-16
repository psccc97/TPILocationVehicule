<!DOCTYPE html>
<html>
    <?php
    require_once 'views/htmlTools.php';
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
                    <?php foreach ($vehicule as $v)?>
                    <!-- Form Name -->
                    <legend>Modifier un véhicule</legend>

                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="control-group">
                            <label class="control-label" for="marque">Marque</label>
                            <div class="controls">
                                <input id="marque" name="marque" type="text" placeholder="" class="input-large" required="" value="<?php echo $v['nomMarque'] ?>">

                            </div>
                        </div>

                        <!-- Text input Modèle-->
                        <div class="control-group">
                            <label class="control-label" for="modele">Modèle</label>
                            <div class="controls">
                                <input id="modele" name="modele" type="text" placeholder="" class="input-large" required="" value="<?php echo $v['nomModole']?>">

                            </div>
                        </div>

                        <!-- Number input Année-->
                        <div class="control-group">
                            <label class="control-label" for="annee">Année</label>
                            <div class="controls">
                                <input id="annee" name="annee" type="number" placeholder="" class="input-large" min="1900" max="<?php echo date("Y"); ?>" value="<?php echo $v['Annee'];?>">

                            </div>
                        </div>                        

                        <!-- Select Basic Catégorie -->
                        <div class="control-group">
                            <label class="control-label" for="categorie">Catégorie</label>
                            <div class="controls">
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <?php if($v['Categorie'] == 'Citadine'):?>
                                        <option value="Familiale">Familiale</option>
                                        <option value="Citadine"><?php echo $v['Categorie']; ?></option>
                                        <option value="Sportive">Sportive</option>
                                    <?php endif; ?>
                                    <?php if($v['Categorie'] == "Familiale") :?>
                                        <option value="Familiale"><?php echo $v['Categorie']; ?></option>
                                        <option value="Citadine">Citadine</option>
                                        <option value="Sportive">Sportive</option>
                                    <?php endif;?>
                                    <?php if($v['Categorie'] == "Sportive") :?>
                                        <option value="Familiale">Familiale</option>
                                        <option value="Citadine">Citadine</option>
                                        <option value="Sportive"><?php echo $v['Categorie'] ?></option>
                                        <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Number input Nombre de place-->
                        <div class="control-group">
                            <label class="control-label" for="nbrPlace">Nombre de place</label>
                            <div class="controls">
                                <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="input-large" max="9" min="0" value="<?php echo $v['nbrPlace']?>">

                            </div>
                        </div>                        

                        <!-- Number input Volume utile-->
                        <div class="control-group">
                            <label class="control-label" for="volume">Volume utile</label>
                            <div class="controls">
                                <input id="volume" name="volume" type="number" placeholder="" class="input-large" value="<?php echo $v['volumeUtile'] ?>"> m3

                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <div class="control-group">
                            <label class="control-label" for="dateDebut">Date de début</label>
                            <div class="controls">
                                <input id="dateDebut" value="<?php echo $v['dateDebut'] ?>" name="dateDebut" type="date" class="input-large" required min="<?php echo date("Y-m-d"); ?>">

                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="control-group">
                            <label class="control-label" for="dateFin">Date de Fin</label>
                            <div class="controls">
                                <input id="dateFin" name="dateFin" type="date" value="<?php echo $v['dateFin']?>" placeholder="" class="input-large" required>

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
                                <textarea id="description" name="description"><?php echo $v['Description']?></textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="control-group">
                            <label class="control-label" for="motorisation">Motorisation</label>
                            <div class="controls">
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <?php if($v['Motorisation'] == 'Essence') :?>
                                        <option value="Essence"><?php echo  $v['Motorisation']?></option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>
                                    <?php endif;?>
                                    <?php if($v['Motorisation'] == 'Diesel') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel"><?php echo $v['Motorisation']?></option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>
                                    <?php endif;?>
                                    <?php if($v['Motorisation'] == 'Gaz') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz"><?php echo $v['Motorisation']?></option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique">Electrique</option>
                                    <?php endif;?>
                                    <?php if($v['Motorisation'] == 'Hybride') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride"><?php echo $v['Motorisation']?></option>
                                        <option value="Electrique">Electrique</option>
                                    <?php endif;?>
                                    <?php if($v['Motorisation'] == 'Electrique') :?>
                                        <option value="Essence">Essence</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gaz">Gaz</option>
                                        <option value="Hybride">Hybride</option>
                                        <option value="Electrique"><?php echo $v['Motorisation']?></option>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                        <div class="control-group">
                            <label class="control-label" for="kilometrage">Kilométrage</label>
                            <div class="controls">
                                <?php foreach ($kilometrages as $k) :?>
                                <?php select('kilometrage', $k['idVehicule'], $v['idKilometrage']); ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Select Basic Type-->
                        <div class="control-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls">
                                <select id="type" name="type" class="input-large">
                                    <?php if($v['Type'] == 'Utilitaire'): ?>
                                        <option value="Utilitaire"><?php echo $v['Type']?></option>
                                        <option value="Voiture">Voiture</option>
                                        <option value="2 roues">2 roues</option>
                                    <?php endif;?>
                                    <?php if($v['Type'] == 'Voiture'): ?>
                                        <option value="Utilitaire">Utilitaire</option>
                                        <option value="Voiture"><?php echo $v['Type']?></option>
                                        <option value="2 roues">2 roues</option>
                                    <?php endif;?>
                                    <?php if($v['Type'] == '2 roues'): ?>
                                        <option value="Utilitaire">Utilitaire</option>
                                        <option value="Voiture">Voiture</option>
                                        <option value="2 roues"><?php echo $v['Type']?></option>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>

                        <!-- File Button Image--> 
                        <div class="control-group">
                            <label class="control-label" for="image">Image</label>
                            <div class="controls">
                                <input id="image" name="image" accept="image/*" class="input-file" type="file" required value="<?php $v['Image']?>">
                            </div>
                        </div>

                    </div>

                    <!-- Button Enregistrer et Annuler-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="enregistrer"></label>
                        <div class="col-md-4">
                            <input type="hidden" name="idVehicule" value="<?php echo $v['idVehicule'] ?>">
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

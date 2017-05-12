<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include 'include/header.php'; ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Navigation -->

        <div class="container">
            <?php include 'include/navBar.php'; ?>

            <form class="form-horizontal" action="louer.html" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Mettre en location un véhicule</legend>

                    <div class="col-md-6 col-xs-6">
                        <!-- Text input Marque-->
                        <div class="control-group">
                            <label class="control-label" for="marque">Marque</label>
                            <div class="controls">
                                <input id="marque" name="marque" type="text" placeholder="" class="input-large" required="">

                            </div>
                        </div>

                        <!-- Text input Modèle-->
                        <div class="control-group">
                            <label class="control-label" for="modele">Modèle</label>
                            <div class="controls">
                                <input id="modele" name="modele" type="text" placeholder="" class="input-large" required="">

                            </div>
                        </div>

                        <!-- Number input Année-->
                        <div class="control-group">
                            <label class="control-label" for="annee">Année</label>
                            <div class="controls">
                                <input id="annee" name="annee" type="number" placeholder="" class="input-large">

                            </div>
                        </div>

                        <!-- Select Basic Catégorie -->
                        <div class="control-group">
                            <label class="control-label" for="categorie">Catégorie</label>
                            <div class="controls">
                                <select id="categorie" name="categorie" class="input-large" required>
                                    <option>Familiale</option>
                                    <option>Citadine</option>
                                    <option>Sportive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Number input Nombre de place-->
                        <div class="control-group">
                            <label class="control-label" for="nbrPlace">Nombre de place</label>
                            <div class="controls">
                                <input id="nbrPalce" name="nbrPalce" type="number" placeholder="" class="input-large">

                            </div>
                        </div>

                        <!-- Number input Volume utile-->
                        <div class="control-group">
                            <label class="control-label" for="volume">Volume utile</label>
                            <div class="controls">
                                <input id="volume" name="volume" type="number" placeholder="" class="input-large"> m3

                            </div>
                        </div>

                        <!-- Date input Date début-->
                        <div class="control-group">
                            <label class="control-label" for="dateDebut">Date de début</label>
                            <div class="controls">
                                <input id="dateDebut" name="DateDebut" type="date" placeholder="" class="input-large">

                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="control-group">
                            <label class="control-label" for="dateFin">Date de Fin</label>
                            <div class="controls">
                                <input id="dateFin" name="dateFin" type="date" placeholder="" class="input-large">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">

                        <!-- Textarea Description-->
                        <div class="control-group">
                            <label class="control-label" for="description">Description</label>
                            <div class="controls">                     
                                <textarea id="description" name="description">default text</textarea>
                            </div>
                        </div>

                        <!-- Select Basic Motorisation-->
                        <div class="control-group">
                            <label class="control-label" for="motorisation">Motorisation</label>
                            <div class="controls">
                                <select id="motorisation" name="motorisation" class="input-large" required>
                                    <option>Essence</option>
                                    <option>Diesel</option>
                                    <option>Gaz</option>
                                    <option>Hybride</option>
                                    <option>Electrique</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic Kilométrage-->
                        <div class="control-group">
                            <label class="control-label" for="kilometrage">Kilométrage</label>
                            <div class="controls">
                                <select id="kilometrage" name="kilometrage" class="input-large" required>
                                    <?php foreach ($kilometrages as $k) :?>
                                    <option value="<?php echo $k['idKilometrage']; ?>"><?php echo $k['nbrKilometrage']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Select Basic Type-->
                        <div class="control-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls">
                                <select id="type" name="type" class="input-large">
                                    <option>Utilitaire</option>
                                    <option>Voiture</option>
                                    <option>2 roues</option>
                                </select>
                            </div>
                        </div>

                        <!-- File Button Image--> 
                        <div class="control-group">
                            <label class="control-label" for="image">Image</label>
                            <div class="controls">
                                <input id="image" name="image" class="input-file" type="file" required>
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

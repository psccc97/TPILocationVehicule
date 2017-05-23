<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include 'include/header.php'; ?>
    <body>
        <div class="container">
            <?php include 'include/navBar.php'; ?>
            <legend>Détails</legend>
            <div class="thumbnail">
                <div class="row">
                    <div class="col-md-3 col-xs-3"></div>
                    <div class="col-md-6 col-xs-6">
                        <h3><?php echo $details['nomMarque'] ?> <?php echo $details['nomModele'] ?></h3>
                        <img class="img-responsive" src="img/<?php echo $details['Image']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Détails du véhicule</div>
                            <table class="table table-striped">
                                <tr>
                                    <td>Type </td>
                                    <td><?php echo $details['Type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Année </td>
                                    <td><?php echo $details['Annee']; ?></td>
                                </tr>
                                <tr>
                                    <td>Categorie </td>
                                    <td><?php echo $details['Categorie']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nombre de place<?= $details['nbrPlace'] > 1 ? 's' : '' ?> </td>
                                    <td><?php echo $details['nbrPlace']; ?></td>
                                </tr>
                                <tr>
                                    <td>Volume utile </td>
                                    <td><?php echo $details['volumeUtile']; ?> m3</td>
                                </tr>
                                <tr>
                                    <td>Motorisation </td>
                                    <td><?php echo $details['Motorisation']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kilométrage </td>
                                    <td><?php echo $details['nbrKilometrage']; ?></td>
                                </tr>
                                <tr>
                                    <td>Description </td>
                                    <td><?php echo $details['Description']; ?></td>
                                </tr>
                                <tr> 
                                    <td>Disponibilité </td>
                                    <td>
                                        <?php foreach ($dispos as $dispo): ?>


                                            <ul>
                                                <li><?php echo $dispo['dateDebut'] ?> ----> <?php echo $dispo['dateFin'] ?></li>
                                            </ul>

                                        <?php endforeach; ?>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <h4>Commentaire et note</h4>
                        <textarea class="form-control"  rows="14" disabled style="resize:none"><?php foreach ($commentaires AS $comment) :?> <?= $comment['Prenom'] ?>  : 
                  <?= $comment['Commentaire'] ?>               <?= "Note :". $comment['Note'] ."/5"."
----------------------------------------------------------------------------------------------------"?><?php endforeach; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include 'include/footer.php'; ?>
</html>

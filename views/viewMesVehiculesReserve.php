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
        <div class="container">
            <?php include 'include/navBar.php'; ?>
            <legend>Mes véhicules réservés</legend>
            <?php foreach ($vehiculesReserver as $vr) :?>
            <div class="thumbnail">
                <div class="row">
                    <div class="col-sm-5 col-xs-5">
                        <h3><?php echo $vr['nomMarque'] ?> <?php echo $vr['nomModele'] ?></h3>
                        <img class="img-rounded" src="img/<?php echo $vr['Image']; ?>" class="img-responsive" style="width: 100%; height: auto; display: block;">
                    </div>                    
                    <div class="col-sm-4 col-xs-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Description véhicule</div>
                            <table class="table table-striped">
                                <tr>
                                    <td>Type </td>
                                    <td><?php echo $vr['Type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Année </td>
                                    <td><?php echo $vr['Annee']; ?></td>
                                </tr>
                                <tr>
                                    <td>Categorie </td>
                                    <td><?php echo $vr['Categorie']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nombre de place </td>
                                    <td><?php echo $vr['nbrPlace']; ?></td>
                                </tr>
                                <tr>
                                    <td>Volume utile </td>
                                    <td><?php echo $vr['volumeUtile']; ?> m3</td>
                                </tr>
                                <tr>
                                    <td>Motorisation </td>
                                    <td><?php echo $vr['Motorisation']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kilométrage </td>
                                    <td><?php echo $vr['nbrKilometrage']; ?></td>
                                </tr>
                                <tr>
                                    <td>Description </td>
                                    <td><?php echo $vr['Description']; ?></td>
                                </tr>
                                <tr>
                                    <td>Réservation </td>
                                    <td><?= $vr['dateDebut'] ?> -----> <?= $vr['dateFin'] ?></td>
                                </tr>
                                <tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <a href="" class="btn btn-danger">Annuler</a><br/>
                        <br/>
                        <a href="commentaire-<?= $vr['idVehicule'] ?>.html" class="btn btn-success">Commenter</a><br/>                    
                    </div>
                </div>      
            </div>
            <?php endforeach; ?>
        </div>
<?php include 'include/footer.php'; ?>
    </body>
</html>

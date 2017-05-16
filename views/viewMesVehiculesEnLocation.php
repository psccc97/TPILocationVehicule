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
            <legend>Mes véhicules en location</legend>
            <?php foreach ($vehicules as $vehicule) : ?>
                <div class="thumbnail">
                    <div class="row">
                        <div class="col-sm-5 col-xs-5">
                            <h3><?php echo $vehicule['nomMarque'] ?> <?php echo $vehicule['nomModele'] ?></h3>
                            <img class="img-rounded" src="img/<?php echo $vehicule['Image']; ?>" class="img-responsive" style="width: 100%; height: auto; display: block;">
                        </div>                    
                        <div class="col-sm-4 col-xs-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Description véhicule</div>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Type </td>
                                        <td><?php echo $vehicule['Type']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Année </td>
                                        <td><?php echo $vehicule['Annee']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Categorie </td>
                                        <td><?php echo $vehicule['Categorie']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nombre de place </td>
                                        <td><?php echo $vehicule['nbrPlace']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Volume utile </td>
                                        <td><?php echo $vehicule['volumeUtile']; ?> m3</td>
                                    </tr>
                                    <tr>
                                        <td>Motorisation </td>
                                        <td><?php echo $vehicule['Motorisation']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kilométrage </td>
                                        <td><?php echo $vehicule['nbrKilometrage']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description </td>
                                        <td><?php echo $vehicule['Description']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <a href="supprimer-<?php echo $vehicule['idVehicule'];?>.html" class="btn btn-danger">Supprimer</a><br/>
                            <br/>
                            <a href="modifier-<?php echo $vehicule['idVehicule'];?>.html" class="btn btn-success">Modifier</a>
                        </div>
                    </div>      
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
<?php include 'include/footer.php'; ?>
</html>

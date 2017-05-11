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
            <?php foreach ($detailsVehicule as $detail) : ?>
            <div class="row">
                <div class="col-md-3 col-xs-3"></div>
                <div id="carousel-example-generic" class="col-md-6 col-xs-6">
                    <h3><?php echo $detail['nomMarque']?> <?php echo $detail['nomModel'] ?></h3>
                    <img class="img-thumbnail" src="img/<?php echo $detail['Image']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Détails du véhicule</div>
                        <table>
                            <tr>
                                <td>Type </td>
                                <td><?php echo $detail['Type']; ?></td>
                            </tr>
                            <tr>
                                <td>Année </td>
                                <td><?php echo $detail['Annee']; ?></td>
                            </tr>
                            <tr>
                                <td>Categorie </td>
                                <td><?php echo $detail['Categorie']; ?></td>
                            </tr>
                            <tr>
                                <td>Nombre de place </td>
                                <td><?php echo $detail['Type']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include 'include/footer.php'; ?>
</html>

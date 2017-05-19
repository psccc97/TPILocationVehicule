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
            <legend>Réservation</legend
            <div class="thumbnail">
                <div class="row">
                    <div class="col-md-3 col-xs-3"></div>
                    <div class="col-md-6 col-xs-6">
                        <h3><?php echo $vehicule['nomMarque'] ?> <?php echo $vehicule['nomModele'] ?></h3>
                        <img class="img-responsive" src="img/<?php echo $vehicule['Image']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Détails du véhicule</div>
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
                                    <td>Nombre de place<?= $vehicule['nbrPlace'] > 1 ? 's' : '' ?> </td>
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
                                <tr>
                                    <td>Disponibilité </td>
                                    <td><?php echo $vehicule['dateDebut'] ?> ----> <?php echo $vehicule['dateFin'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <form class="form-horizontal" method="post"  action="controlerReserver.html">
                        
                        <!-- Date input Date début-->
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-md-4" for="marque">Date de début</label>
                            </div>
                            <div class="controls col-md-4">
                                <input type="hidden" name="acienneDateDebut" value="<?= $vehicule['dateDebut'] ?>">
                                <input id="dateDebut" name="dateDebut" type="date" class="form-control input-md" required min="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <!-- Date input Date fin-->
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-md-4" for="marque">Date de fin</label>
                            </div>
                            <div class="controls col-md-4">
                                <input type="hidden" name="ancienneDateFin" value="<?= $vehicule['dateFin'] ?>">
                                <input id="dateFin" name="dateFin" type="date" placeholder="" class="form-control input-md" max="<?= $vehicule['dateFin'] ?>" required>
                                <?php if (isset($msgError)): ?>
                                    <p class="bg-danger text-danger"><?php echo $msgError; ?></p>
                                <?php endif; ?>
                                <?php if (isset($msgErrorDateDebut)): ?>
                                    <p class="bg-danger text-danger"><?php echo $msgErrorDateDebut; ?></p>
                                <?php endif; ?>    
                            </div>
                        </div>
                        <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
                        <div class="form-group">
                            <div class="cold-md-4">
                                <button id="reserver" class="btn btn-default" name="reserver">Réserver</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>

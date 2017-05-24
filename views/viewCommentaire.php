<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php        
        $msgError = GetFlashMessage();
        include 'include/header.php'; 
        ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
   <div class="container">
            <?php include 'include/navBar.php'; ?>
            <legend>Commentaire et note</legend
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
                                    <td>
                                        <?php foreach ($dispos as $di) :?>
                                        <ul>
                                            <li><?php echo $di['dateDebut'] ?> ----> <?php echo $di['dateFin'] ?></li>
                                        </ul>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <form class="form-horizontal" method="post"  action="commentaire.html">

                            <!-- TextArea commentaire -->
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-4" for="commentaire">Commentaire</label>
                                </div>
                                <div class="controls col-md-6">
                                    <textarea class="form-control input-md" name="commentaire"></textarea>
                                </div>
                            </div>

                            <!-- Select note-->
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-2" for="note">Note</label>
                                </div>
                                <div class="controls col-md-2">
                                    <select id="note" name="note" class="form-control input-md">
                                        <option selected="true" value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="controls col-md-1">/5</div>
                            </div>
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
                            <div class="form-group">
                                <div class="cold-md-4">
                                    <input type="submit" value="Envoyer" id="envoyer" class="btn btn-default" name="envoyer">
                                </div>
                            </div>
                            <?php if(!empty($msgError)) :?>
                            <p class="bg-danger text-danger"><?= $msgError ?></p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php include 'include/footer.php'; ?>
    </body>
</html>

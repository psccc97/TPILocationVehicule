<?php

require_once 'models/bddfunctions.php';

if (filter_has_var(INPUT_POST, 'connexion')) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp');

    $u = verifIdentificationUtilisateur($prenom, sha1($mdp));

    if ($u) {
        session_start(); //Je start la session pour mettre les donnée de l'utilisateur dedans
        $_SESSION['idUtilisateur'] = $u['idUtilisateur'];
        $_SESSION['status'] = $u['Status'];
        $_SESSION['prenom'] = $prenom;

        //Ici se sont les deux conditions pour savoir si l'utilisateur est admin ou pas        

        header('location:accueil.html');
        exit;
    } else {
        $msgError = "Votre prénom ou mot de passe est incorect !!";
    }
}
include 'views/connexion.php';


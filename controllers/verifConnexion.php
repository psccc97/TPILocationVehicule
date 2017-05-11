<?php

require_once '../models/bddfunctions.php';

if (filter_has_var(INPUT_POST, 'connexion')) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp');

    $u = verifIndentificationUtilisateur($prenom, sha1($mdp));

    if ($u) {
        session_start(); //Je start la session pour mettre les donnée de l'utilisateur dedans
        $_SESSION['idUtilisateur'] = $u['idUtilisateur'];
        $_SESSION['statut'] = $u['Statut'];
        $_SESSION['prenom'] = $prenom;
        
        //Ici se sont les deux conditions pour savoir si l'utilisateur est admin ou pas
        if ($u['Statut'] == 1 /*le numéro 1 = admin*/) {
            
            header('location: ../accueil.html');
            exit();
        }
        if ($u['Statut'] == 0 /*le numéro 0 = l'utilisateur normal*/) {
            
            header('location: ../accueil.html');
            exit();
        }
    } else {
        echo 'Erreur';
    }
}

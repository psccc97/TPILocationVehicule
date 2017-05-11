<?php

/*
 * Script : index.php
 * Auteur: Pascucci Lino
 * Date: 9.05.2017
 * Version : 1.0
 * Description :controlleur principale il permet de rediriger dans les différents controlleurs
*/

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);
if (empty($action)) {
    $action = 'accueil';
}

    switch ($action) {
        case 'accueil':
            require_once 'controllers/controllerIndex.php';
            break;
        case 'connexion':
            require_once 'controllers/controllerConnexion.php';
            break;
        case 'details':
            require_once 'controllers/controllerDetails.php';
            break;
        case 'deconnexion':
            require_once 'controllers/deconnexion.php';
            break;
        
    }
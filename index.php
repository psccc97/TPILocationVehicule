<?php

/*
 * User: lino
 * Date: 27.04.2017
 * Time: 11:03
 * Version : 1.0
 * Description :controleur principale il permet de rediriger dans les différents controleurs
*/

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);
if (empty($action)) {
    $action = 'accueil';
}

    switch ($action) {
        case 'accueil':
            require_once 'controllers/controllerIndex.php';
            break;      
    }
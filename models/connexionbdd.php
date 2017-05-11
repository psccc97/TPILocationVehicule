<?php


/**
 * C'est une fonction qui permet de se connecter à la base de donnée
 * @staticvar type $bd
 * @return \PDO
 */
function connexionBdd() {
    define('HOST', "localhost");
    $dbname = "bdd_location_vehicule";
    $user = "userTPI";
    $password = "Super";
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    static $bd = NULL;

    if ($bd === NULL) {
        try {
            $bd = new PDO('mysql:host=' . HOST . ';dbname=' . $dbname . ';charset=utf8', $user, $password, $pdo_options);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    return $bd;
}


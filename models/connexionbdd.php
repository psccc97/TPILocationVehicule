<?php

/*
 * Fichier : modele connexionbdd.php
 * Auteur: Pascucci Lino
 * Date: 10.05.2017
 * Description : contient la fonction de connexion à la bdd
 */


/**
 * C'est une fonction qui permet de se connecter à la base de donnée
 * @staticvar type $bd
 * @return \PDO
 */
define('HOST', "localhost");
function connexionBdd() {
    
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


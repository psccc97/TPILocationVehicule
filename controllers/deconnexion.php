<?php
/*
 * Fichier : modele bddfunctions.php
 * Auteur: Pascucci Lino
 * Date: 10.05.2017
 * Version : 1.0
 * Description : contient les fonctions intéragissant avec la base de donnée
*/

//On ouvre la session
session_start();

//On vide le tableau $_SESSION
$_SESSION = array();

//On détruit la session
session_destroy();

//Desactive la session
unset($_SESSION);

//Redirection dans le controlleurs principale
header('location: accueil.html');


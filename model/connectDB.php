<?php

define('HOST', "localhost");


function connectDb() {
    $dbname = "bd_blog_facebook";
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


<?php
require "controleur/routeur.class.php";

// Initialisation du routeur
$index = new routeur();
$index->routerRequete();

// Permet de sécuriser les données (empêcher les failles XSS)
function securize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
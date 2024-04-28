<?php
require "controleur/routeur.class.php";

// Initialisation du routeur
$index = new routeur();
$index->routerRequete();

// Permet de sécuriser les données (empêcher les failles XSS)
function securize($data)
{
    $data = trim($data); // Enlève les espaces en début et fin de chaîne
    $data = stripslashes($data); // Enlève les antislashs
    $data = htmlspecialchars($data); // Convertit les caractères spéciaux en entités HTML
    return $data;
}
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

// Permet de formater une date en fonction de la langue
function format_date($dateString)
{
    // Vérifier si la session lang est définie
    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    } else {
        // Par défaut, utiliser l'anglais
        $lang = 'ENG';
    }

    // Tableaux de formats de date par langue
    $formats = array(
        'ENG' => 'Y-m-d',
        'FR' => 'd/m/Y',
    );

    // Récupérer le format correspondant à la langue
    $format = $formats[$lang];

    // Convertir la chaîne de date en objet DateTime
    $date = new DateTime($dateString);

    // Formater la date selon le format spécifique à la langue
    $formattedDate = $date->format($format);

    return $formattedDate;
}
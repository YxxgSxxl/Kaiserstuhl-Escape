<?php
abstract class Config
{
    // Definition des paramètres de la BDD
    public static $DBhost = "localhost";
    public static $DBname = "kaiserstuhl";
    public static $DBuser = "root";
    public static $DBpwd = "";

    // Definition du dossier de stockage membres
    public static $membersFolder = "upload/members/"; // A modifier en fonction du chemin vers lequel vous voulez enregistrer les utilisateurs (N'oubliez pas le "/" à la fin  du chemin)
    // Definition du dossier de stockage items
    public static $itemsFolder = "upload/items/"; // A modifier en fonction du chemin vers lequel vous voulez enregistrer les items (N'oubliez pas le "/" à la fin  du chemin)
    // Definition du dossier de stockage games
    public static $gamesFolder = "upload/games/"; // A modifier en fonction du chemin vers lequel vous voulez enregistrer les jeux (N'oubliez pas le "/" à la fin  du chemin)
}
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
}
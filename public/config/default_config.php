<?php
require_once "config.class.php";

$Conf = new stdClass();

$Conf->DBHOST = Config::$DBhost ?? "localhost";
$Conf->DBNAME = Config::$DBname ?? "kaiserstuhl";
$Conf->DBUSER = Config::$DBuser ?? "root";
$Conf->DBPWD = Config::$DBpwd ?? "";

$Conf->MEMBERSFOLDER = Config::$membersFolder ?? "upload/members/"; // Chemin par défaut si le dossier n'est pas défini dans config.class.php
$Conf->ITEMSFOLDER = Config::$itemsFolder ?? "upload/items/"; // Chemin par défaut si le dossier n'est pas défini dans config.class.php
$Conf->GAMESFOLDER = Config::$gamesFolder ?? "upload/games/"; // Chemin par défaut si le dossier n'est pas défini dans config.class.php
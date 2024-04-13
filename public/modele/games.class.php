<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des jeux dans la base de données
****************************************************************/
class games extends database
{
    /*******************************************************
    Retourne la liste des jeux
      Entrée : 
    
      Retour : 
        [array] : Tableau associatif contenant la liste des jeux
    *******************************************************/
    public function getGames()
    {
        $req = 'SELECT * FROM games;';
        $games = $this->execReq($req);
        return $games;
    }

    /*******************************************************
    Retourne la description d'un item
      Entrée : 
        idArt [string] : Identifiant de l'item
    
      Retour : 
        [array] : Tableau associatif contenant les attributs de l'item
    *******************************************************/
    public function getGamesID($idGames)
    {
        $req = 'SELECT * FROM games WHERE id_games=?;';
        $resultat = $this->execReqPrep($req, array($idGames));
        return $resultat[0];
    }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
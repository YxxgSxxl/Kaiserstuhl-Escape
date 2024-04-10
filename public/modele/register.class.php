<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des articles dans la base de données
****************************************************************/
class register extends database
{
    /*******************************************************
    Retourne la liste des items
      Entrée : 
    
      Retour : 
        [array] : Tableau associatif contenant la liste des items
    *******************************************************/
    public function newMemberReg($username, $email, $mdp)
    {
        $req = 'INSERT INTO members(username, email, mdp) ' . 'VALUES (?, ?, ?)';
        $reponse = $this->execReqPrep($req, array($username, $mdp, $email));

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
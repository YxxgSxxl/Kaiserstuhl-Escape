<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des membres dans la base de données
****************************************************************/
class members extends database
{
    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifUsernameBDD($username)
    {
        $req = 'SELECT * FROM members WHERE username = ?';
        $reponse = $this->execReqPrepNOARRAY($req, $username);

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifPassBDD($mdp, $username)
    {
        $req = 'SELECT * FROM members WHERE mdp = ? AND username = ?';
        $reponse = $this->execReqPrep($req, array(sha1($mdp), $username));

        if ($reponse && count($reponse) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifEmailBDD($email)
    {
        $req = 'SELECT * FROM members WHERE email = ?';
        $reponse = $this->execReqPrepNOARRAY($req, $email);

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
      Entrée : 
    
      Retour : 
        [array] : Tableau contenant le membre
    *******************************************************/
    public function newMemberReg($username, $email, $mdp)
    {
        $req = 'INSERT INTO members(username, email, mdp) ' . 'VALUES (?, ?, ?)';
        $reponse = $this->execReqPrep($req, array($username, $email, sha1($mdp)));

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function infoMember($username)
    {
        $req = 'SELECT * FROM members WHERE username = ?;';
        $resultat = $this->execReqPrep($req, array($_SESSION['username']));
        return $resultat[0];
    }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
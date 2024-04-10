<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des articles dans la base de données
****************************************************************/
class items extends database
{
  /*******************************************************
  Retourne la liste des items
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des items
  *******************************************************/
  public function getItems()
  {
    $req = 'SELECT * FROM items;';
    $items = $this->execReq($req);
    return $items;
  }

  /*******************************************************
  Retourne la description d'un item
    Entrée : 
      idArt [string] : Identifiant de l'item
  
    Retour : 
      [array] : Tableau associatif contenant les attributs de l'item
  *******************************************************/
  public function getItem($idItems)
  {
    $req = 'SELECT * FROM items; WHERE id_item=?;';
    $resultat = $this->execReqPrep($req, array($idItems));
    return $resultat[0];
  }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
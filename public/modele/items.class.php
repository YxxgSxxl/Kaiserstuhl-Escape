<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des items dans la base de données
****************************************************************/
class items extends database
{
  private $items;

  public function __construct()
  {
    $this->items = array();
  }
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
  Retourne la description d'un item via son identifiant
    Entrée : 
      idItems [string] : Identifiant de l'item
  
    Retour : 
      [array] : Tableau associatif contenant les attributs de l'item
  *******************************************************/
  public function getItem($idItem)
  {
    $req = 'SELECT * FROM items WHERE id_item=?;';
    $resultat = $this->execReqPrep($req, array($idItem));
    return $resultat[0];
  }

  /*******************************************************
    Retourne la description d'un item via son identifiant
      Entrée : 
        idItems [string] : Identifiant de l'item
  
      Retour : 
        [array] : Tableau associatif contenant les attributs de l'item
  *******************************************************/
  public function verifItem($idItem)
  {
    $req = 'SELECT * FROM items WHERE id_item=?;';
    $reponse = $this->execReqPrep($req, array($idItem));

    // if ($reponse && count($reponse) > 0) {
    //   return TRUE;
    // } else {
    //   return FALSE;
    // }

    return (bool) $reponse;
  }

  /*******************************************************
  Retourne la description d'un item via son identifiant
    Entrée : 
      idItems [string] : Identifiant de l'item

    Retour : 
      [array] : Tableau associatif contenant les attributs de l'item
  *******************************************************/
  public function addItem($img, $name, $description, $price, $delivery_time)
  {
    $req = 'ALTER TABLE items ADD img = ?, name = ?, description = ?, price = ?, $delivery_time = ?;';
    $resultat = $this->execReqPrep($req, array($img, $name, $description, $price, $delivery_time));
    return $resultat[0];
  }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
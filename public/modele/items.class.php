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
  Ajoute un item dans la base de données
    Entrée : 
      

    Retour : 
      [array] : Tableau associatif contenant les attributs de l'item
  *******************************************************/
  public function addItem($img, $goodname, $gooddesc, $price, $delivery_time)
  {
    $req = 'INSERT INTO items (img, goodname, gooddesc, price, delivery_time) VALUES (?, ?, ?, ?, ?);';
    $resultat = $this->execReqPrep($req, array($img, $goodname, $gooddesc, $price, $delivery_time));

    // Vérifier si $resultat est un tableau et s'il contient au moins un élément
    if (is_array($resultat) && count($resultat) > 0) {
      return $resultat[0];
    } else {
      // Gérer le cas où $resultat ne retourne pas de tableau
      // Peut-être retourner un message d'erreur ou une valeur par défaut
      return null;
    }
  }

  public function deleteItem($idItem)
  {
    $req = 'DELETE FROM items WHERE id_item=?;';
    $resultat = $this->execReqPrep($req, array($idItem));
    return $resultat;
  }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
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
  public function getGame($idGames)
  {
    $req = 'SELECT * FROM games WHERE id_game= ?;';
    $resultat = $this->execReqPrep($req, array($idGames));
    return $resultat[0];
  }

  /*******************************************************
Ajoute un Jeu dans la base de données
  Entrée : 
    

  Retour : 
    [array] : Tableau associatif contenant les attributs du jeu
*******************************************************/
  public function addGame($title, $longdesc, $minidesc, $price, $duration, $lengths, $dateStart, $dateEnd, $difficulty, $img)
  {
    $req = 'INSERT INTO games (title, longdesc, minidesc, price, duration, lengths, dateStart, dateEnd, difficulty, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
    $resultat = $this->execReqPrep($req, array($title, $longdesc, $minidesc, $price, $duration, $lengths, $dateStart, $dateEnd, $difficulty, $img));

    // Vérifier si $resultat est un tableau et s'il contient au moins un élément
    if (is_array($resultat) && count($resultat) > 0) {
      return $resultat[0];
    } else {
      // Gérer le cas où $resultat ne retourne pas de tableau
      // Peut-être retourner un message d'erreur ou une valeur par défaut
      return null;
    }
  }

  public function modifGame($title, $longdesc, $minidesc, $price, $duration, $lengths, $dateStart, $dateEnd, $difficulty, $img, $id_game)
  {
    $req = 'UPDATE games SET title=?, longdesc=?, minidesc=?, price=? ,duration=?, lengths=?, dateStart=?, dateEnd=?, difficulty=?, img=? WHERE id_game=?;';
    $resultat = $this->execReqPrep($req, array($title, $longdesc, $minidesc, $price, $duration, $lengths, $dateStart, $dateEnd, $difficulty, $img, $id_game));
    return $resultat;
  }

  public function modifImg($img, $id_game)
  {
    $req = 'UPDATE games SET img=? WHERE id_game=?;';
    $resultat = $this->execReqPrep($req, array($img, $id_game));
    return $resultat;
  }

  public function deleteGame($idGame)
  {
    $req = 'DELETE FROM games WHERE id_game=?;';
    $resultat = $this->execReqPrep($req, array($idGame));
    return $resultat;
  }

  public function getBooking($id_user)
  {
    $req = 'SELECT ab.*, a.*
    FROM games_booking ab
    INNER JOIN games a ON ab.id_game = a.id_game
    WHERE ab.id_member = ?;';

    $resultat = $this->execReqPrep($req, array($id_user));
    return $resultat;
  }

  public function addBooking($id_game, $id_member, $people, $dates, $time)
  {
    $req = 'INSERT INTO games_booking (id_game, id_member, people, dates, time) VALUES (?, ?, ?, ?, ?);';
    $resultat = $this->execReqPrep($req, array($id_game, $id_member, $people, $dates, $time));
    return $resultat;
  }

  public function deleteBooking($id_reservation)
  {
    $req = 'DELETE FROM games_booking WHERE id_reservation=?;';
    $resultat = $this->execReqPrep($req, array($id_reservation));
    return $resultat;
  }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
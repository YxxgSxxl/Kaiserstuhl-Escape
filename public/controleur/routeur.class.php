<?php
require_once "modele/items.class.php";
require_once "modele/games.class.php";
require_once "modele/members.class.php";

require_once "controleur/ctlAvis.php";
require_once "controleur/ctlUser.php";
require_once "controleur/ctlInscription.php";
require_once "controleur/ctlConnection.php";
require_once "controleur/ctlJeux.php";
require_once "controleur/ctlContact.php";
require_once "controleur/ctlAbout.php";
require_once "controleur/ctlBons.php";
require_once "controleur/ctlPage.php";
require_once "config/config.class.php";

session_start();

// Si il n'y a pas de panier, on en crée un
if (!isset($_SESSION['panier'])) {
  $_SESSION['panier'] = array();

} else {

}

// var_dump($_SESSION);

class routeur
{
  private $ctlPage, $ctlAbout, $ctlBons, $ctlContact, $ctlJeux, $ctlConnection, $ctlInscription, $ctlUser, $ctlAvis;

  public function __construct()
  {
    $this->ctlPage = new ctlPage();
    $this->ctlBons = new ctlBons();
    $this->ctlAbout = new ctlAbout();
    $this->ctlContact = new ctlContact();
    $this->ctlJeux = new ctlJeux();
    $this->ctlConnection = new ctlConnection();
    $this->ctlInscription = new ctlInscription();
    $this->ctlUser = new ctlUser();
    $this->ctlAvis = new ctlAvis();
  }

  public function routerRequete()
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          // ITEMS side
          case 'goods':
            $this->ctlBons->vueBons();
            break;
          case 'goods' && isset($_GET['idItem']):
            $this->ctlBons->vueBon($_GET['idItem']);
            break;
          case 'goodAdd':
            $this->ctlBons->vueAjoutBon();
            break;
          case 'goodAddConfirm':
            $this->ctlBons->addBon();
            break;
          case 'modification' && isset($_GET['idItemModif']):
            $this->ctlBons->vueModifBon();
            break;
          case 'modificationConfirm':
            $this->ctlBons->modifBon();
            break;
          case 'modification' && isset($_GET['goodDelete']):
            $this->ctlBons->deleteBon();
            break;
          // GAMES side
          case 'games':
            $this->ctlJeux->vueJeux();
            break;
          case 'games' && isset($_GET['idGame']):
            $this->ctlJeux->vueJeu($_GET['idGame']);
            break;
          case 'modification' && isset($_GET['idGameModif']):
            $this->ctlBons->vueModifGame();
            break;
          case 'review':
            $this->ctlAvis->vueAvis();
            break;
          // CART side
          case 'cart':
            $this->ctlBons->vuePanier();
            break;
          case 'flushCart':
            $this->ctlBons->flushCart();
            break;
          // CONTACT side
          case 'contact':
            $this->ctlContact->vueContact();
            break;
          // USER side
          case 'login':
            $this->ctlConnection->vueConnection();
            break;
          case 'logMember':
            $this->ctlConnection->logMember();
            break;
          case 'register':
            $this->ctlInscription->vueInscription();
            break;
          case 'regMember':
            $this->ctlInscription->regMember();
            break;
          case 'user':
            $this->ctlUser->vueUser();
            break;
          case 'userModify':
            $this->ctlUser->modifyUser();
            break;
          case 'userModifyConfirm':
            $this->ctlUser->modifyUserConfirm();
            break;
          case 'userDelete':
            $this->ctlUser->deleteUser();
            break;
          case 'logout':
            $this->ctlUser->deconnexion();
            break;
        }
      } else {
        $this->ctlPage->accueil();
      }
    } catch (Exception $e) {
      $this->ctlPage->erreur($e->getMessage()); // Page d'erreur
    }   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
  }
}
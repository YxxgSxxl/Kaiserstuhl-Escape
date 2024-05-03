<?php
require_once "modele/items.class.php";
require_once "modele/games.class.php";
require_once "modele/members.class.php";

require_once "controleur/ctlTeam.php";
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

// Instanciation de la langue par défaut
if (!isset($_SESSION['lang'])) {
  $_SESSION['lang'] = 'FR';
}

// Si l'utilisateur change de langue, on récupère celle-ci
if (isset($_POST['langue'])) {
  $_SESSION['lang'] = $_POST['langue'];
} else {
  if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
  }
}

// var_dump($_SESSION);

class routeur
{
  private $ctlPage, $ctlTeam, $ctlBons, $ctlContact, $ctlJeux, $ctlConnection, $ctlInscription, $ctlUser, $ctlAvis;

  public function __construct()
  {
    $this->ctlPage = new ctlPage();
    $this->ctlBons = new ctlBons();
    $this->ctlTeam = new ctlTeam();
    $this->ctlContact = new ctlContact();
    $this->ctlJeux = new ctlJeux();
    $this->ctlConnection = new ctlConnection();
    $this->ctlInscription = new ctlInscription();
    $this->ctlUser = new ctlUser();
  }

  public function routerRequete()
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          // LANGUAGE side
          case 'changeLang':
            $this->ctlPage->changeLang();
            break;
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
          case 'modificationBonConfirm':
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
          case 'gameAdd':
            $this->ctlJeux->vueAjoutJeu();
            break;
          case 'gameAddConfirm':
            $this->ctlJeux->addGame();
            break;
          case 'modification' && isset($_GET['idGameModif']):
            $this->ctlJeux->vueModifJeu();
            break;
          case 'modificationJeuConfirm':
            $this->ctlJeux->modifJeu();
            break;
          case 'modification' && isset($_GET['gameDelete']):
            $this->ctlJeux->deleteGame();
            break;
          case 'reservation' && isset($_GET['idGameRes']):
            $this->ctlJeux->vueReservation($_GET['idGameRes']);
            break;
          case 'reserver' && isset($_GET['idGameResConfirm']):
            $this->ctlJeux->reserver($_GET['idGameResConfirm']);
            break;
          case 'reservationDelete' && isset($_GET['idRes']):
            $this->ctlJeux->removeBooking($_GET['idRes']);
            break;
          case 'review':
            $this->ctlAvis->vueAvis();
            break;
          // CART side
          case 'cart':
            $this->ctlBons->vuePanier();
            break;
          case 'cart' && isset($_GET['deleteCartItem']):
            $this->ctlBons->deleteCartItem($_GET['deleteCartItem']);
            break;
          case 'flushCart':
            $this->ctlBons->flushCart();
            break;
          case 'checkout':
            $this->ctlBons->checkout();
            break;
          case 'payment':
            $this->ctlBons->payment();
            break;
          // CONTACT side
          case 'contact':
            $this->ctlContact->vueContact();
            break;
          // TEAM side
          case 'team':
            $this->ctlTeam->vueTeam();
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
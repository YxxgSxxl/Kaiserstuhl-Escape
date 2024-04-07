<?php
require_once "controleur/ctlAvis.php";

require_once "controleur/ctlInscription.php";
require_once "controleur/ctlConnection.php";
require_once "controleur/ctlContact.php";
require_once "controleur/ctlAbout.php";
require_once "controleur/ctlBons.php";
require_once "controleur/ctlPage.php";
require_once "config/config.class.php";


class routeur
{
  private $ctlPage, $ctlAbout, $ctlBons, $ctlContact, $ctlConnection, $ctlInscription, $ctlAvis;

  public function __construct()
  {
    $this->ctlPage = new ctlPage();
    $this->ctlBons = new ctlBons();
    $this->ctlAbout = new ctlAbout();
    $this->ctlContact = new ctlContact();
    $this->ctlConnection = new ctlConnection();
    $this->ctlInscription = new ctlInscription();

    $this->ctlAvis = new ctlAvis();
  }

  public function routerRequete()
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'about':
            $this->ctlAbout->vueAbout();
            break;
          case 'goods':
            $this->ctlBons->vueBons();
            break;
          case 'contact':
            $this->ctlContact->vueContact();
            break;
          case 'login':
            $this->ctlConnection->vueConnection();
            break;
          case 'register':
            $this->ctlInscription->vueInscription();
            break;
          case 'review':
            $this->ctlAvis->vueAvis();
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
<?php
require_once "modele/register.class.php";

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
          case 'regMember':
            $this->ctlInscription->regMember();
            break;
          case 'user':
            $this->ctlUser->vueUser();
            break;
          case 'play':
            $this->ctlJeux->vueJeux();
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
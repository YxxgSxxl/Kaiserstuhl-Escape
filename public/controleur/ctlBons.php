<?php
require_once "modele/items.class.php";
require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlBons
{
    private $item;
    private $user;

    public function __construct()
    {
        $this->item = new items(); // Items
        $this->user = new members(); // Members
    }


    public function vueBons()
    {
        $items = $this->item->getItems();
        if (isset($_SESSION['username'])) {
            $users = $this->user->infoMember($_SESSION['username']);
        } else {
            $users = "";
        }
        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users
            )
        );
    }
    public function vueBon($id)
    {
        $item = $this->item->getItem($id);

        $vue = new vue("Bon"); // Instancie la vue appropriée
        $vue->afficher(array('item' => $item));
    }

    // Foncion nécessitant d'être ADMIN
    public function vueAjoutBon()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("AjoutBon"); // Instancie la vue appropriée
                $vue->afficher(array('users' => $users));
            } else {
                header('Location: index.php?action=goods');
            }
        } else {
            $users = "";
        }
    }

    public function addBon()
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users

            )
        );
    }

    public function vueModifBon()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("modifBon"); // Instancie la vue appropriée
                $vue->afficher(array('users' => $users));
            } else {
                header('Location: index.php?action=goods');
            }
        } else {
            $users = "";
        }
    }
}
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

    // public function vueBons()
    // {
    //     $vue = new vue("Bons"); // Instancie la vue appropriée
    //     $vue->afficher(array());
    // }

    public function vueBons()
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
}
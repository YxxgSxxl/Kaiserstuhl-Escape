<?php
require_once "modele/items.class.php";
require_once "vue/vue.class.php";

class ctlBons
{
    private $item;

    public function __construct()
    {
        $this->item = new items();
    }

    // public function vueBons()
    // {
    //     $vue = new vue("Bons"); // Instancie la vue appropriée
    //     $vue->afficher(array());
    // }

    public function vueBons()
    {
        $items = $this->item->getItems();
        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(array('items' => $items));
    }
}
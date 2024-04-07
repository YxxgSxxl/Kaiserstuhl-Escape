<?php
require_once "vue/vue.class.php";

class ctlContact
{
    public function vueContact()
    {
        $vue = new vue("Contact"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
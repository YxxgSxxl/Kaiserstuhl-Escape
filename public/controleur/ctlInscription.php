<?php
require_once "vue/vue.class.php";

class ctlInscription
{
    public function vueInscription()
    {
        $vue = new vue("Inscription"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
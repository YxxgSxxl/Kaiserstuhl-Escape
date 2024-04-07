<?php
require_once "vue/vue.class.php";

class ctlAvis
{
    public function vueAvis()
    {
        $vue = new vue("Avis"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
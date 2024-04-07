<?php
require_once "vue/vue.class.php";

class ctlConnection
{
    public function vueConnection()
    {
        $vue = new vue("Connection"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
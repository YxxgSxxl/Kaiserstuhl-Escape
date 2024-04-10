<?php
require_once "vue/vue.class.php";

class ctlUser
{
    public function vueUser()
    {
        $vue = new vue("User"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
<?php
require_once "vue/vue.class.php";

class ctlTeam
{
    public function vueTeam()
    {
        $vue = new vue("Team"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
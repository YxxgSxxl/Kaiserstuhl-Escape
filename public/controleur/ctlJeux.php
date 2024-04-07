<?php
require_once "vue/vue.class.php";

class ctlJeux
{
    public function vueJeux()
    {
        $vue = new vue("Jeux"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
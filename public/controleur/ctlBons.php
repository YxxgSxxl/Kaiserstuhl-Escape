<?php
require_once "vue/vue.class.php";

class ctlBons
{
    public function vueBons()
    {
        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
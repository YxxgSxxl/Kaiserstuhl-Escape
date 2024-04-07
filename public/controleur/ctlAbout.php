<?php
require_once "vue/vue.class.php";

class ctlAbout
{
    public function vueAbout()
    {
        $vue = new vue("Apropos"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
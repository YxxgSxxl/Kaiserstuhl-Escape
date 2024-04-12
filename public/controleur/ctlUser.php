<?php
require_once "vue/vue.class.php";

class ctlUser
{
    public function vueUser()
    {
        $vue = new vue("User"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function deconnexion()
    {
        $_SESSION = array();
        session_destroy();

        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
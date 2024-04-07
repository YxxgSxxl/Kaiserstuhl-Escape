<?php
require_once "vue/vue.class.php";

class ctlPage{

    public function accueil(){
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function erreur($erreur){
        $vue = new vue("Erreur"); // Instancie la vue appropriée
        $vue->afficher(array("erreur" => $erreur));
    }
}
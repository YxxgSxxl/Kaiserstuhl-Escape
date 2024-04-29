<?php
require_once "vue/vue.class.php";

class ctlPage
{

    public function accueil()
    {
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function erreur($erreur)
    {
        $vue = new vue("Erreur"); // Instancie la vue appropriée
        $vue->afficher(array("erreur" => $erreur));
    }

    public function changeLang()
    {
        if (isset($_POST['language'])) {
            $_SESSION['lang'] = $_POST['langue'];
        }

        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array("langue" => $_POST['langue']));
    }
}
<?php
require_once "modele/register.class.php";

require_once "vue/vue.class.php";

class ctlInscription
{
    private $register;

    public function __construct()
    {
        $this->register = new register();
    }

    public function vueInscription()
    {
        $vue = new vue("Inscription"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function regMember()
    {
        extract($_POST);

        $message = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= "Veuillez indiquer une adresse mail valide";
        if (empty($username))
            $message .= "Veuillez indiquer un pseudo<br>";
        if (empty($mdp))
            $message .= "Veuillez indiquer un age<br>";
        if ($_POST['mdp_confirm'] != $_POST['mdp']) {
            $message .= "Les mots de passe ne correspondent pas";
        }
        if (empty($message)) {
            if ($this->register->newMemberReg($username, $email, $mdp))
                $this->vueInscription(); // Affichage de la liste des clients modifiée
            else
                throw new Exception("Echec de l'enregistrement du nouveau client");
        } else {
            throw new Exception($message);
        }
    }
}
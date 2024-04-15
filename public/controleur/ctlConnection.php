<?php
require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlConnection
{
    private $member;

    public function __construct()
    {
        $this->member = new members();
    }

    public function vueConnection()
    {
        $vue = new vue("Connection"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function logMember()
    {
        extract($_POST);

        $message = "";
        $succes = '<small class="ks-alertwrapper bg-ks-black/40 text-ks-orange absolute right-0 left-0 z-10 text-center flex flex-row justify-center gap-4 items-center select-none lg:text-base">Vous êtes conecté !<div class="relative"><svg class="ks-alert" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div></small>';

        // Vérification que les champs ne sont pas vides
        if (empty($username) || empty($mdp)) {
            $message .= "<span class='text-red-500'>*Veuillez remplir tous les champs</span><br>";
        }
        if (empty($message)) {
            if ($this->member->verifUsernameBDD($username) == TRUE) {
                if ($this->member->verifPassBDD($mdp, $username) == TRUE) {
                    // Réussite de la connexion
                    $_SESSION['username'] = $username;

                    $vue = new vue("Accueil"); // Instancie la vue appropriée
                    $vue->afficher(array('message' => $message));
                    // var_dump($_POST);
                } else {
                    // MDP incorrect
                    $message .= "<span class='text-red-500'>*Le mot de passe saisi est incorrect</span><br>";

                    $vue = new vue("Connection"); // Instancie la vue appropriée
                    $vue->afficher(array('message' => $message));
                    // var_dump($_POST);
                }
            } else {
                // Nom d'utilisateur introuvable dans la BDD
                $message .= "<span class='text-red-500'>*Le nom d'utilisateur saisi n'éxiste pas</span><br>";

                $vue = new vue("Connection"); // Instancie la vue appropriée
                $vue->afficher(array('message' => $message));
            }
        } else {
            $vue = new vue("Connection");
            $vue->afficher(array('message' => $message));
        }
    }
}
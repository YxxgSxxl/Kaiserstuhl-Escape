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

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function vueConnection()
    {
        $vue = new vue("Connection"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function logMember()
    {
        extract($_POST);

        $message = "";

        // Vérification que les champs ne sont pas vides
        if (empty($username) || empty($mdp)) {
            $message .= "<span class='text-red-500'>*Veuillez remplir tous les champs</span><br>";
        }
        if (empty($message)) {
            if ($this->member->verifUsernameBDD(securize($username)) == TRUE) {
                if ($this->member->verifPassBDD($mdp, $username) == TRUE) {
                    // Réussite de la connexion
                    $_SESSION['username'] = $username;

                    $vue = new vue("Accueil"); // Instancie la vue appropriée
                    $vue->afficher(
                        array(
                            'message' => $message,
                            'user' => $username
                        )
                    );
                    // var_dump($_POST);
                } else {
                    // MDP incorrect
                    if ($_SESSION['lang'] === 'ENG')
                        $message .= "<span class='text-red-500'>*The password entered is incorect</span><br>";
                    else
                        $message .= "<span class='text-red-500'>*Le mot de passe saisi est incorrect</span><br>";

                    $vue = new vue("Connection"); // Instancie la vue appropriée
                    $vue->afficher(array('message' => $message));
                    // var_dump($_POST);
                }
            } else {
                // Nom d'utilisateur introuvable dans la BDD
                if ($_SESSION['lang'] === 'ENG')
                    $message .= "<span class='text-red-500'>*The username entered does not exist</span><br>";
                else
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
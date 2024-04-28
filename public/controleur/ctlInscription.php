<?php
require_once "config/default_config.php";

require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlInscription
{
    private $member;

    public function __construct()
    {
        $this->member = new members();
    }

    public function vueInscription()
    {
        $vue = new vue("Inscription");
        $vue->afficher(array());
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function regMember()
    {
        extract($_POST);

        $message = "";
        $succes = '<small id="alert" class="ks-alertwrapper bg-ks-black/40 text-ks-orange absolute right-0 left-0 z-10 text-center flex flex-row justify-center gap-4 items-center select-none lg:text-base animate-pulse">Nouveau client enregistré !<div class="relative"><button onclick="hideAlert()"><svg class="ks-alert" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button></div></small>';

        if (empty($email) || empty($username) || empty($mdp) || empty($mdp_confirm)) {
            $message .= "<span class='text-red-500'>*Veuillez remplir tous les champs</span><br>";
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                // EMAIL invalide
                $message .= "<span class='text-red-500'>*Veuillez indiquer une adresse mail valide</span><br>";
            if ($_POST['mdp_confirm'] != $_POST['mdp']) {
                // MDP ne correspondent pas
                $message .= "<span class='text-red-500'>*Les mots de passe ne correspondent pas</span><br>";
            }
        }
        if (empty($message)) {
            if ($this->member->verifUsernameBDD($username) == TRUE) {
                // Le nom d'utilisateur est déjà pris
                $message .= "<span class='text-red-500'>*Le nom d'utilisateur est déjà pris</span><br>";

                $vue = new vue("Inscription");
                $vue->afficher(array('message' => $message));
            } elseif ($this->member->verifEmailBDD($email) == TRUE) {
                // L'email est déjà pris
                $message .= "<span class='text-red-500'>*L'Email est déjà pris</span><br>";

                $vue = new vue("Inscription");
                $vue->afficher(array('message' => $message));
            } else {
                if ($this->member->newMemberReg(securize("$username.png"), securize($username), securize($email), $mdp)) {

                    global $Conf; // Récupère les variables de configuration

                    // Réussite de l'enregistrement de l'utilisateur
                    echo $succes; // Message d'alerte disant que l'utilisateur est enregistré avec succès
                    require_once "components/alert.html"; // Inclut le script JS pour cacher l'alerte

                    // Attribution du nom d'utilisateur à la session
                    $_SESSION['username'] = $username;

                    // $this->member->insertAvatar($username);

                    // Création du dossier personnel de l'utilisateur
                    if (file_exists($Conf->MEMBERSFOLDER . $username)) { // Si le dossier existe déjà
                        $this->member->removeDir($Conf->MEMBERSFOLDER . $username); // Supprime le dossier existant

                        mkdir($Conf->MEMBERSFOLDER . "/" . $username, 0777, true); // Creation du dossier avec le nom de l'utilisateur
                        copy('img/template/default-pp.png', $Conf->MEMBERSFOLDER . "/" . $username . '/' . $username . '.png'); // Copy the default profile picture to the user's folder
                    } elseif (!file_exists($Conf->MEMBERSFOLDER . "/" . $username)) { // Si le dossier n'existe pas
                        mkdir($Conf->MEMBERSFOLDER . "/" . $username, 0777, true); // Creation du dossier avec le nom de l'utilisateur
                        copy('img/template/default-pp.png', $Conf->MEMBERSFOLDER . "/" . $username . '/' . $username . '.png'); // Copy the default profile picture to the user's folder
                    }

                    // Affichage de la vue appropriée
                    $vue = new vue("User");
                    $vue->afficher(
                        array(
                            'message' => $message,
                            'users' => $this->member->infoMember($username)
                        )
                    );
                } else {
                    // Echec de l'enregistrement Inconnu
                    $vue = new vue("Inscription");
                    $vue->afficher(array('message' => $message));

                    throw new Exception("Echec de l'enregistrement du nouveau client");
                }
            }
        } else {
            $vue = new vue("Inscription");
            $vue->afficher(array('message' => $message));
        }
    }
}
<?php
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

    public function regMember()
    {
        extract($_POST);

        $message = "";
        $succes = '<small class="ks-alertwrapper bg-ks-black/40 text-ks-white absolute right-0 left-0 text-center flex flex-row justify-center gap-4 items-center lg:text-base">Nouveau client enregistré !<div class="relative"><svg class="ks-alert" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div></small>';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= "Veuillez indiquer une adresse mail valide";
        if (empty($username))
            $message .= "Veuillez indiquer un pseudo<br>";
        if (empty($mdp))
            $message .= "Veuillez indiquer un age<br>";
        if ($_POST['mdp_confirm'] != $_POST['mdp']) {
        }
        if (empty($message)) {
            if ($this->member->newMemberReg($username, $email, $mdp)) {
                echo $succes;
                $vue = new vue("Inscription");
                $vue->afficher(array('message' => $message));
            } else {
                throw new Exception("Echec de l'enregistrement du nouveau client");
            }
        } else {
            throw new Exception($message);
        }
    }
}
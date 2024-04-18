<?php
require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlUser
{
    private $user;

    public function __construct()
    {
        $this->user = new members();
    }

    public function vueUser()
    {
        $users = $this->user->infoMember($_SESSION['username']);
        // var_dump($users);
        $vue = new vue("User"); // Instancie la vue appropriée
        $vue->afficher(array('users' => $users));
    }

    public function userRegImg()
    {
        $users = $this->user->infoMember($_SESSION['username']);

        // $this->user->uploadMemberImg($users);

        // var_dump($_POST);
        // var_dump($_FILES);

        // var_dump($users);
        $vue = new vue("User"); // Instancie la vue appropriée
        $vue->afficher(array('users' => $users));
    }

    public function deconnexion()
    {
        $_SESSION = array();
        session_destroy();

        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array());
    }
}
<?php
require_once "modele/items.class.php";
require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlJeux
{
    private $game;
    private $user;

    public function __construct()
    {
        $this->game = new games();
        $this->user = new members();
    }

    public function vueJeux()
    {
        $games = $this->game->getGames();
        if (isset($_SESSION['username'])) {
            $users = $this->user->infoMember($_SESSION['username']);
        } else {
            $users = "";
        }
        $vue = new vue("Jeux"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'games' => $games,
                'users' => $users
            )
        );
    }

    public function vueJeu($id)
    {
        $game = $this->game->getGame($id);
        $vue = new vue("Jeu"); // Instancie la vue appropriée
        $vue->afficher(array('game' => $game));
    }
}
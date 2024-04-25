<?php
require_once "vue/vue.class.php";

class ctlJeux
{
    private $game;

    public function __construct()
    {
        $this->game = new games();
    }

    public function vueJeux()
    {
        $games = $this->game->getGames();
        $vue = new vue("Jeux"); // Instancie la vue appropriée
        $vue->afficher(array('games' => $games));
    }

    public function vueJeu($id)
    {
        $games = $this->game->getGame($id);
        $vue = new vue("Jeux"); // Instancie la vue appropriée
        $vue->afficher(array('games' => $games));
    }
}
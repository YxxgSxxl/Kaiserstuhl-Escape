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

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function vueAjoutJeu()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("AjoutJeu"); // Instancie la vue appropriée
                $vue->afficher(array('users' => $users));
            } else {
                header('Location: index.php?action=games');
            }
        } else {
            $users = "";
        }
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function addGame()
    {
        $games = $this->game->getGames();
        $users = $this->user->infoMember($_SESSION['username']);

        global $Conf;

        if (isset($_POST['submit'])) {
            // Vérifier s'il y a des erreurs lors du téléchargement
            if ($_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
                // Vérifier la taille du fichier téléchargé
                $maxFileSize = 2 * 1024 * 1024; // 2MB
                if ($_FILES['newImage']['size'] > $maxFileSize) {
                    $erreur = "The image size is too large, you need to choose a smaller file.<br>Maximum permitted is 2MB.";

                    $vue = new vue("Erreur"); // Instancie la vue appropriée
                    $vue->afficher(
                        array('erreur' => $erreur)
                    );
                    return;
                } else {
                    // Déplacer le fichier téléchargé vers le dossier de destination
                    $destination = $Conf->GAMESFOLDER . $_FILES['newImage']['name'];
                    if (move_uploaded_file($_FILES['newImage']['tmp_name'], $destination)) {
                        // Récupérer les autres données du formulaire
                        $title = $_POST['title'];
                        $longdesc = $_POST['longdesc'];
                        $minidesc = $_POST['minidesc'];
                        $price = $_POST['price'];
                        $duration = $_POST['duration'];
                        $lengths = $_POST['lengths'];
                        $dateStart = $_POST['dateStart'];
                        $dateEnd = $_POST['dateEnd'];
                        $difficulty = $_POST['difficulty'];
                        $img = $_FILES['newImage']['name'];

                        // Ajouter les données à la base de données
                        $this->game->addGame($title, $longdesc, $minidesc, $price, $duration, $lengths, $dateStart, $dateEnd, $difficulty, $img);

                        // Rediriger l'utilisateur vers une autre page
                        header('Location: index.php?action=games');
                        exit; // Terminer l'exécution du script après la redirection
                    } else {
                        // Gérer l'échec du déplacement du fichier
                        $erreur = "Error moving the image file to destination folder.";

                        $vue = new vue("Erreur"); // Instancie la vue appropriée
                        $vue->afficher(
                            array('erreur' => $erreur)
                        );
                        return;
                    }
                }
            } else {
                // Gérer les erreurs de téléchargement
                $erreur = "Error while downloading the image file.";

                $vue = new vue("Erreur"); // Instancie la vue appropriée
                $vue->afficher(
                    array('erreur' => $erreur)
                );
                return;
            }
        }

        $vue = new vue("Jeux"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'games' => $games,
                'users' => $users

            )
        );
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function vueModifJeu()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);
            $game = $this->game->getGame($_GET['idGameModif']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("ModifJeu"); // Instancie la vue appropriée
                $vue->afficher(
                    array(
                        'users' => $users,
                        'game' => $game
                    )
                );
            } else {
                $erreur = "You don't have the permission to modify a game";

                $vue = new vue("Erreur"); // Instancie la vue appropriée
                $vue->afficher(
                    array('erreur' => $erreur)
                );
            }
        }
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function modifJeu()
    {
        global $Conf;

        // Vérifier si des données ont été soumises via le formulaire
        if (!empty($_POST)) {
            // Récupérer les données du formulaire
            $id_game = $_POST['id_game'];
            $title = $_POST['title'];
            $longdesc = $_POST['longdesc'];
            $minidesc = $_POST['minidesc'];
            $price = $_POST['price'];
            $duration = $_POST['duration'];
            $lengths = $_POST['lengths'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];
            $difficulty = $_POST['difficulty'];

            // Récupérer les informations sur l'article
            $game = $this->game->getGame($id_game);

            // Vérifier si un fichier a été téléchargé
            if (!empty($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                // Vérifier la taille du fichier téléchargé
                $maxFileSize = 2 * 1024 * 1024; // 2MB
                if ($_FILES['img']['size'] > $maxFileSize) {
                    $erreur = "The image size is too large, you need to choose a smaller file.<br>Maximum permitted is 2MB.";
                    $vue = new vue("Erreur"); // Instancie la vue appropriée
                    $vue->afficher(array('erreur' => $erreur));
                    return; // Arrêter l'exécution de la fonction
                }

                // Chemin de l'ancienne image
                $oldImagePath = $Conf->GAMESFOLDER . $game['img'];

                // Vérifier si l'ancienne image existe et la supprimer
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Déplacer le nouveau fichier téléchargé vers le dossier de destination
                $newImageName = $_FILES['img']['name'];
                $destination = $Conf->GAMESFOLDER . $newImageName;
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $destination)) {
                    $erreur = "Error moving the image file to destination folder.";
                    $vue = new vue("Erreur"); // Instancie la vue appropriée
                    $vue->afficher(array('erreur' => $erreur));
                    return; // Arrêter l'exécution de la fonction
                }
            } else {
                // Si aucun fichier n'a été téléchargé, conserver l'ancienne image
                $newImageName = $game['img'];
            }

            // Mettre à jour les données dans la base de données
            $this->game->modifGame(securize($title), securize($longdesc), securize($minidesc), securize($price), securize($duration), securize($lengths), $dateStart, $dateEnd, $difficulty, $newImageName, $id_game);
            $this->game->modifImg($newImageName, $id_game);

            // Rediriger l'utilisateur vers une autre page
            header('Location: index.php?action=games');
        } else {
            // Si aucune donnée n'a été soumise, rediriger l'utilisateur vers une autre page
            header('Location: index.php?action=games');
        }
    }


    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function deleteGame()
    {
        $games = $this->game->getGames();
        $users = $this->user->infoMember($_SESSION['username']);

        global $Conf;

        if ($users['member_role'] == 'Admin') {
            if (isset($_GET['gameDelete'])) {

                $game = $this->game->getGame($_GET['gameDelete']);
                extract($game);

                var_dump($game);

                // Delete the image file from the goods directory
                if (file_exists($Conf->GAMESFOLDER . $game['img'])) {
                    unlink($Conf->GAMESFOLDER . $game['img']);
                }

                $this->game->deleteGame($_GET['gameDelete']);

                header('Location: index.php?action=games');

                $vue = new vue("Jeux"); // Instancie la vue appropriée
                $vue->afficher(
                    array(
                        'games' => $games,
                        'users' => $users
                    )
                );
            }
        } else {
            $erreur = "Vous n'avez pas les droits pour supprimer un Jeu";
            $vue = new vue("Erreur"); // Instancie la vue appropriée
            $vue->afficher(
                array('erreur' => $erreur)
            );
        }

    }

    public function vueReservation($idJeu)
    {
        $game = $this->game->getGame($idJeu);

        $vue = new vue("Reservation"); // Instancie la vue appropriée
        $vue->afficher(array('game' => $game));
    }

    public function reserver($idJeu)
    {
        $users = $this->user->infoMember($_SESSION['username']);

        $this->game->addBooking($idJeu, $users['id_member'], securize($_POST['people']), $_POST['dates'], $_POST['time']);

        header('Location: index.php?action=user');
    }

    public function removeBooking($idBooking)
    {
        $this->game->deleteBooking($idBooking);

        header('Location: index.php?action=user');
    }
}
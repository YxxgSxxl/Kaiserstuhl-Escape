<?php
require_once "modele/items.class.php";
require_once "modele/members.class.php";

require_once "vue/vue.class.php";

class ctlBons
{
    private $item;
    private $user;

    public function __construct()
    {
        $this->item = new items(); // Items
        $this->user = new members(); // Members
    }


    public function vueBons()
    {
        $items = $this->item->getItems();
        if (isset($_SESSION['username'])) {
            $users = $this->user->infoMember($_SESSION['username']);
        } else {
            $users = "";
        }
        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users
            )
        );
    }
    public function vueBon($id)
    {
        $item = $this->item->getItem($id);

        $vue = new vue("Bon"); // Instancie la vue appropriée
        $vue->afficher(array('item' => $item));
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function vueAjoutBon()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("AjoutBon"); // Instancie la vue appropriée
                $vue->afficher(array('users' => $users));
            } else {
                header('Location: index.php?action=goods');
            }
        } else {
            $users = "";
        }
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function addBon()
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        global $Conf;

        if (isset($_POST['submit'])) {
            // Vérifier s'il y a des erreurs lors du téléchargement
            if ($_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
                // Déplacer le fichier téléchargé vers le dossier de destination
                $destination = $Conf->ITEMSFOLDER . $_FILES['newImage']['name'];
                if (move_uploaded_file($_FILES['newImage']['tmp_name'], $destination)) {
                    // Récupérer les autres données du formulaire
                    $img = $_FILES['newImage']['name'];
                    $goodname = $_POST['goodname'];
                    $gooddesc = $_POST['gooddesc'];
                    $price = $_POST['price'];
                    $delivery_time = $_POST['delivery_time'];

                    // Ajouter les données à la base de données
                    $this->item->addItem($img, $goodname, $gooddesc, $price, $delivery_time);

                    // Rediriger l'utilisateur vers une autre page
                    header('Location: index.php?action=goods');
                    exit; // Terminer l'exécution du script après la redirection
                } else {
                    // Gérer l'échec du déplacement du fichier
                    echo "Erreur lors du déplacement du fichier vers le dossier de destination.";
                }
            } else {
                // Gérer les erreurs de téléchargement
                echo "Erreur lors du téléchargement du fichier.";
            }
        }

        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users

            )
        );
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function vueModifBon()
    {
        if ($_SESSION['username']) {
            $users = $this->user->infoMember($_SESSION['username']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("modifBon"); // Instancie la vue appropriée
                $vue->afficher(array('users' => $users));
            } else {
                header('Location: index.php?action=goods');
            }
        } else {
            $users = "";
        }
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function deleteBon()
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        global $Conf;


        if ($users['member_role'] == 'Admin') {
            if (isset($_GET['goodDelete'])) {

                $item = $this->item->getItem($_GET['goodDelete']);
                extract($item);

                var_dump($item);

                // Delete the image file from the goods directory
                if (file_exists($Conf->ITEMSFOLDER . $item['img'])) {
                    unlink($Conf->ITEMSFOLDER . $item['img']);
                }

                $this->item->deleteItem($_GET['goodDelete']);

                header('Location: index.php?action=goods');

                $vue = new vue("Bons"); // Instancie la vue appropriée
                $vue->afficher(
                    array(
                        'items' => $items,
                        'users' => $users
                    )
                );
            }
        } else {
            $erreur = "Vous n'avez pas les droits pour supprimer un item";
            $vue = new vue("Bons"); // Instancie la vue appropriée
            $vue->afficher(
                array('erreur' => $erreur)
            );
        }

    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function vuePanier()
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        // Si il y a un idProduct dans l'URL, on le met dans la variable $id
        if (isset($_GET['idProduct'])) {

            $panier = $this->item->getItem($_GET['idProduct']); // IMPORTANT
            // var_dump("LOL");

            // On vérifie que l'idProduct est bien un item
            if ($this->item->verifItem($_GET['idProduct']) == TRUE) {
                // On ajoute l'idProduct dans le panier
                // array_push($_SESSION['panier'], $_GET['idProduct']);

                $infos = $this->item->getItem($_GET['idProduct']);

                if (isset($_SESSION['panier'][$_GET['idProduct']])) {
                    $_SESSION['panier'][$_GET['idProduct']]['quantité']++;
                    // $_SESSION['panier'][$_GET['idProduct']] .= [array($infos)];
                } else {
                    $_SESSION['panier'][$_GET['idProduct']]['quantité'] = 1;
                    // echo "L'item a bien été ajouté au panier";
                }

                // On redirige vers la page du panier
                header('Location: index.php?action=goods');

                $vue = new vue("Panier"); // Instancie la vue appropriée
                $vue->afficher(
                    array(
                        'panier' => $panier,
                        'items' => $items,
                        'users' => $users
                    )
                );
            } elseif ($this->item->verifItem($_GET['idProduct']) == FALSE) {
                // Sinon on redirige vers la page des erreurs
                $erreur = "Le produit n'existe pas";
                $vue = new vue("Erreur"); // Instancie la vue appropriée
                $vue->afficher(array("erreur" => $erreur));
            }

        } else {
            $vue = new vue("Panier"); // Instancie la vue appropriée
            $vue->afficher(
                array(
                    'items' => $items,
                    'users' => $users
                )
            );
        }
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function flushCart()
    {
        unset($_SESSION['panier']);
        header('Location: index.php?action=cart');
    }
}
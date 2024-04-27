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

    // Foncion nécessitant d'être ADMIN
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

    public function addBon()
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        $vue = new vue("Bons"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users

            )
        );
    }

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

    public function flushCart()
    {
        unset($_SESSION['panier']);
        header('Location: index.php?action=cart');
    }
}
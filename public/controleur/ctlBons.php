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
        if (isset($_SESSION['username'])) {
            $users = $this->user->infoMember($_SESSION['username']);
            $item = $this->item->getItem($_GET['idItemModif']);

            if ($users['member_role'] == 'Admin') {
                $vue = new vue("ModifBon"); // Instancie la vue appropriée
                $vue->afficher(
                    array(
                        'users' => $users,
                        'item' => $item
                    )
                );
            } else {
                $erreur = "You don't have the permission to modify an item";

                $vue = new vue("Erreur"); // Instancie la vue appropriée
                $vue->afficher(
                    array('erreur' => $erreur)
                );
            }
        } else {
            $erreur = "You don't have the permission to modify an item";

            $vue = new vue("Erreur"); // Instancie la vue appropriée
            $vue->afficher(
                array('erreur' => $erreur)
            );
        }
    }

    ////////////////////
    // FONCTION ADMIN //
    ////////////////////
    public function modifBon()
    {
        global $Conf;

        // Vérifier si des données ont été soumises via le formulaire
        if (!empty($_POST)) {
            // Récupérer les données du formulaire
            $id_item = $_POST['id_item'];
            $goodname = $_POST['goodname'];
            $gooddesc = $_POST['gooddesc'];
            $price = $_POST['price'];
            $delivery_time = $_POST['delivery_time'];

            // Récupérer les informations sur l'article
            $item = $this->item->getItem($id_item);

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
                $oldImagePath = $Conf->ITEMSFOLDER . $item['img'];

                // Vérifier si l'ancienne image existe et la supprimer
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Déplacer le nouveau fichier téléchargé vers le dossier de destination
                $newImageName = $_FILES['img']['name'];
                $destination = $Conf->ITEMSFOLDER . $newImageName;
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $destination)) {
                    $erreur = "Error moving the image file to destination folder.";
                    $vue = new vue("Erreur"); // Instancie la vue appropriée
                    $vue->afficher(array('erreur' => $erreur));
                    return; // Arrêter l'exécution de la fonction
                }
            } else {
                // Si aucun fichier n'a été téléchargé, conserver l'ancienne image
                $newImageName = $item['img'];
            }

            // Mettre à jour les données dans la base de données
            $this->item->modifItem(securize($goodname), securize($gooddesc), $price, $delivery_time, $id_item);
            $this->item->modifImg($newImageName, $id_item);

            // Rediriger l'utilisateur vers une autre page
            header('Location: index.php?action=goods');
        } else {
            // Si aucune donnée n'a été soumise, rediriger l'utilisateur vers une autre page
            header('Location: index.php?action=goods');
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

        // Si il y a un idProduct dans l'URL, on le met dans la variable $id
        if (isset($_GET['idProduct'])) {

            if (empty($_SESSION['username'])) {
                if ($_SESSION['lang'] === 'ENG')
                    $erreur = "You need to be logged in to add a product to the cart";
                else
                    $erreur = "Vous devez être connecté pour ajouter un produit au panier";

                $vue = new vue("Erreur"); // Instancie la vue appropriée
                $vue->afficher(array("erreur" => $erreur));
            } else {
                $items = $this->item->getItems();
                $users = $this->user->infoMember($_SESSION['username']);
                $panier = $this->item->getItem($_GET['idProduct']); // IMPORTANT

                // On vérifie que l'idProduct est bien un item
                if ($this->item->verifItem($_GET['idProduct']) == TRUE) {
                    // On ajoute l'idProduct dans le panier
                    // array_push($_SESSION['panier'], $_GET['idProduct']);

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
                    if ($_SESSION['lang'] === 'ENG')
                        $erreur = "The product does not exist";
                    else
                        $erreur = "Le produit n'existe pas";

                    $vue = new vue("Erreur"); // Instancie la vue appropriée
                    $vue->afficher(array("erreur" => $erreur));
                }
            }
        } else {
            $items = $this->item->getItems();
            $users = $this->user->infoMember($_SESSION['username']);

            $panier = "";

            $panier = array();
            foreach ($_SESSION['panier'] as $idProduct => $infos) {
                $item = $this->item->getItem($idProduct);
                $panier[] = $item;
            }

            $vue = new vue("Panier"); // Instancie la vue appropriée
            $vue->afficher(
                array(
                    'panier' => $panier,
                    'items' => $items,
                    'users' => $users
                )
            );
        }
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function deleteCartItem($id)
    {
        $items = $this->item->getItems();
        $users = $this->user->infoMember($_SESSION['username']);

        // On supprime l'item du panier
        unset($_SESSION['panier'][$id]);

        // On redirige vers la page du panier
        header('Location: index.php?action=cart');

        $vue = new vue("Panier"); // Instancie la vue appropriée
        $vue->afficher(
            array(
                'items' => $items,
                'users' => $users
            )
        );
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function flushCart()
    {
        unset($_SESSION['panier']);
        header('Location: index.php?action=cart');
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function checkout()
    {
        if (!empty($_SESSION['panier'])) {
            $vue = new vue("PaymentPannel"); // Instancie la vue appropriée
            $vue->afficher(array());
        }
    }

    /////////////////////
    // FONCTION MEMBRE //
    /////////////////////
    public function payment()
    {
        if (!empty($_SESSION['panier'])) {
            $items = $this->item->getItems();
            $users = $this->user->infoMember($_SESSION['username']);

            $panier = "";

            $panier = array();
            foreach ($_SESSION['panier'] as $idProduct => $infos) {
                $item = $this->item->getItem($idProduct);
                $panier[] = $item;
            }

            $vue = new vue("Payment"); // Instancie la vue appropriée
            $vue->afficher(
                array(
                    'panier' => $panier,
                    'items' => $items,
                    'users' => $users
                )
            );
        } else {
            if ($_SESSION['lang'] === 'ENG')
                $erreur = "Your cart is empty";
            else
                $erreur = "Votre panier est vide";

            $vue = new vue("Erreur"); // Instancie la vue appropriée
            $vue->afficher(array("erreur" => $erreur));
        }
    }
}
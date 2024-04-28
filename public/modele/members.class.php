<?php
require_once "modele/database.class.php";

/****************************************************************
Classe chargée de la gestion des membres dans la base de données
****************************************************************/
class members extends database
{
    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifUsernameBDD($username)
    {
        $req = 'SELECT * FROM members WHERE username = ?';
        $reponse = $this->execReqPrepNOARRAY($req, $username);

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifPassBDD($mdp, $username)
    {
        $req = 'SELECT * FROM members WHERE mdp = ? AND username = ?';
        $reponse = $this->execReqPrep($req, array(sha1($mdp), $username));

        if ($reponse && count($reponse) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
        Entrée : 

        Retour : 
            [string] : chaine de caractères contenant le nom d'utilisateur du membre
    *******************************************************/
    public function verifEmailBDD($email)
    {
        $req = 'SELECT * FROM members WHERE email = ?';
        $reponse = $this->execReqPrepNOARRAY($req, $email);

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*******************************************************
    Enregistre un nouveau membre dans la base de données
      Entrée : 
    
      Retour : 
        [array] : Tableau contenant le membre
    *******************************************************/
    public function newMemberReg($avatar, $username, $email, $mdp, $member_role = 'Member') // Membre par défaut
    {
        $req = 'INSERT INTO members(avatar, username, email, mdp, member_role) ' . 'VALUES (?, ?, ?, ?, ?)';
        $reponse = $this->execReqPrep($req, array($avatar, $username, $email, sha1($mdp), $member_role));

        if ($reponse == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function infoMember($username)
    {
        $req = 'SELECT * FROM members WHERE username = ?;';
        $resultat = $this->execReqPrep($req, array($_SESSION['username']));
        return $resultat[0];
    }

    public function updateAvatar($avatar, $id)
    {
        $req = 'UPDATE members SET avatar = ? WHERE id_member = ?;';
        $resultat = $this->execReqPrep($req, array($avatar, $id));
        return $resultat;
    }

    public function updateMemberInfo($email, $firstname, $lastname, $age, $phonenum, $country, $zip_code, $city, $street, $id)
    {
        $req = 'UPDATE members SET email = ?, firstname = ?, lastname = ?, age = ?, phonenum = ?, country = ?, zip_code = ?, city = ?, street = ? WHERE id_member = ?;';
        $resultat = $this->execReqPrep($req, array($email, $firstname, $lastname, $age, $phonenum, $country, $zip_code, $city, $street, $id));
        return $resultat;
    }

    public function updateMemberPass($pass, $id)
    {
        $req = 'UPDATE members SET mdp = ? WHERE id_member = ?;';
        $resultat = $this->execReqPrep($req, array(sha1($pass), $id));
        return $resultat;
    }

    public function removeDir(string $dir): void
    {
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator(
            $it,
            RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getPathname());
            } else {
                unlink($file->getPathname());
            }
        }
        rmdir($dir);
    }

    public function removeMember($id_member)
    {
        $req = 'DELETE FROM members WHERE id_member = ?;';
        $resultat = $this->execReqPrep($req, array($id_member));
        return $resultat;
    }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
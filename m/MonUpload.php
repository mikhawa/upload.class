<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MonUpload
 *
 * @author Michael
 */
class MonUpload {
    protected $nom;
    protected $nomChemin;
    protected $extension;

    public function __construct($fichier, Array $ext_valides = [".jpg",".gif",".png"], $dest_origine = "v/upload/original/ ",
                                $nb_lettres=6)
    {
        $this->extension = $this->setExtension($fichier['name']);
        if (in_array($this->extension, $ext_valides)) {
            // création d'un nouveau nom
            $this->nom = $this->nommer(8);
            $this->nomChemin = "$dest_origine.$this->nom.$this->extension";
            $this->envoyerOriginale($fichier);
        }else{
            echo "Erreur d'extension de fichier";
        }
    }

    protected function setExtension($fichier)
    {
        // on prend l'extension (strrchr prend ce qui suit le dernier "." de la chaine)
        $extension = strrchr($fichier, '.');
        // on met l'extension en minuscule
        $extension = strtolower($extension);
        return $extension;

    }

    protected function envoyerOriginale($fichier){
        if(move_uploaded_file($fichier['tmp_name'], $this->nomChemin)){
            return true;
        }else{
            echo "Erreur lors de l'envoi du fichier";
        }
    }

    protected function nommer($nb_lettres) {
        $nom = date("Y-m-d-");
        $lettres = array("a", "b", "c", "d", "e", "f", "g", "h", 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $nb_l = count($lettres) - 1;
        for ($i = 0; $i < $nb_lettres; $i++) {
            $nom .= $lettres[rand(0, $nb_l)];
        }
        return $nom;
    }
}

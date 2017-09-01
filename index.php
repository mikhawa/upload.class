<?php
/*
 * Contrôleur frontal
 */

require_once 'm/MonUpload.php';

// si on a envoyé le formulaire
if ($_FILES) {
    // si on a sélectionné un fichier
    if (!empty($_FILES['photo'])) {
        var_dump($_FILES);
        $f = new MonUpload($_FILES['photo']);
        
    }
}

?>
<form method="POST" action="" enctype="multipart/form-data" name="envoi">
    <input type="file" name="photo" />
    <br/>
    <input type="submit" value="Envoyer" />
</form>
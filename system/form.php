<?php 

// pareil que pour l'index mais on utilise la balise hidden de notre formulaire qui sert à définir le fichier voulu
$chemin = RACINE_CHEMIN . "system/form/" . $_POST["file"] . ".php";

// pour la sécurité on nettoie
if(is_file($chemin)) {
    array_walk_recursive($_POST, function(&$v){
        $v = strip_tags(htmlspecialchars(trim($v)));
    });

    include $chemin;
}
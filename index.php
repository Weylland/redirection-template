<?php

session_start();

// on inclut le fichier qui contient nos variable constante et d'autre info si besoin
require "./config.php";

// si une requête ajax est faite on appel le bon fichier de traitement
// si on appel un fichier de traitement ajax on n'exécute pas la suite
if(!empty($_POST)) {
    include "./system/form.php";
    if($_POST['ajax'] == 1) exit;
}

// Si on appel la racine du site ca veut dire que le paramètre url est vide
// pour ne pas avoir d'erreur php j'utilise la variable $get qui vaudra "accueil"
if(!empty($_GET['url'])) {
   $get = $_GET['url']; 
} else {
    $get = "accueil";
}

// je définie la valeur de $chemin en me servant de ce qu'on a récupéré dans l'url
// exemple pour une page "contact" $chemin aura la valeur "/racine-du-serveur/page/contact.php
$chemin = RACINE_CHEMIN ."/page/" .  $get  . ".php";

// si le fichier $chemin est bien un fichier alors on inclut le head, la page contact et le footer
if(is_file($chemin)) {

    include "./page/include/head.php";

    include $chemin;

    include "./page/include/footer.php";

}
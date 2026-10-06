<?php
session_start();
@include("connexion.php"); 

if (!isset($_SESSION["USER"])) {
    header("Location: index.php");
    exit();
}

echo "<a href='logout.php'>Déconnexion</a> | ";
echo "<a href='animation.php'>Voir les animations</a><br><br>";

if (isset($_SESSION["TYPEPROFIL"]) && $_SESSION["TYPEPROFIL"] == "EN") {

    echo "<h1>Bienvenue, Encadrant " . htmlspecialchars($_SESSION["PRENOMCOMPTE"]) . "</h1>";
    echo "<a href='ajouteranimations.php'>Ajouter une animation</a><br>";
    echo "<a href='modifieranimations.php'>Modifier une animation</a><br>";
    
} else if (isset($_SESSION["TYPEPROFIL"]) && $_SESSION["TYPEPROFIL"] == "VA") {

    echo "<h1>Bienvenue, Vacancier " . htmlspecialchars($_SESSION["PRENOMCOMPTE"]) . "</h1>";

}
?>
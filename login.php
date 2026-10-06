<?php
session_start();
@include("connexion.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $mdp = mysqli_real_escape_string($conn, $_POST["mdp"]);

    $sql = "SELECT * FROM compte WHERE USER='$user' AND MDP='$mdp'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $login = mysqli_fetch_assoc($result);

        $_SESSION["USER"] = $login["USER"];
        $_SESSION["NOMCOMPTE"] = $login["NOMCOMPTE"];
        $_SESSION["PRENOMCOMPTE"] = $login["PRENOMCOMPTE"];
        $_SESSION["TYPEPROFIL"] = $login["TYPEPROFIL"];

        header("Location: menu.php");
        exit();

    } else {
        header("Location: index.php");
        exit();
    }
}
?>
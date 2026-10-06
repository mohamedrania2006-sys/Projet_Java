<?php
session_start();

include("connexion.php");


$liste_anim = "SELECT NOMANIM,DUREEANIM,LIMITEAGE, TARIFANIM, NBREPLACEANIM
              FROM animation";
$res_liste_anim = mysqli_query($conn, $liste_anim);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Animations</title>
    
</head>
<body>
            <h2>Liste animations</h2>
            <table>
                <head>
                    <tr>
                        <th>Nom Animation</th>
                        <th>Durée</th>
                        <th>Limite Âge</th>
                        <th>Tarif</th>
                        <th>Nombre Places</th>
                    </tr>
                </head>
                <body>
                    <?php 
                    if ($res_liste_anim && mysqli_num_rows($res_liste_anim) > 0) {
                        
                        while ($animation = mysqli_fetch_assoc($res_liste_anim)) {
                            echo "<tr>";
                            echo "<td>" . $animation['NOMANIM'] . "</td>";
                            echo "<td>" . $animation['DUREEANIM'] . "</td>";
                            echo "<td>" . $animation['LIMITEAGE'] . "</td>";
                            echo "<td>" . $animation['TARIFANIM'] . "</td>";
                            echo "<td>" . $animation['NBREPLACEANIM'] . "</td>";
                            echo "</tr>";
                        }
                        
                    } else {
                        echo "<tr><td>Aucune animation trouvée.</td></tr>";
                    }
                    ?>
                </body>
            </table>
</body>
</html>

<?php 
mysqli_close($conn); 
?>
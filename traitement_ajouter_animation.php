<?php
session_start();
@include("connexion.php");

$success = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$nomanim = $_POST['nomanim'];
$dureeanim = $_POST['dureeanim'];
$limiteage = $_POST['limiteage'];
$tarifanim = $_POST['tarifanim'];
$nbreplaceanim = $_POST['nbreplaceanim'];

$ajt_anim = "INSERT INTO animation (NOMANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM)
              VALUES ('$nomanim', '$dureeanim', '$limiteage', '$tarifanim', '$nbreplaceanim')";
$res_ajt_anim = mysqli_query($conn, $ajt_anim);

    if ($res_ajt_anim == TRUE) {
        $success = true;
    }

    mysqli_close($conn);

} else {
    header("Location: ajouteranimations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'Animation</title>
</head>
<body>


    <div class="login-wrapper">
        <div class="login-box visible" style="max-width: 550px;">
            <div class="confirmation-box">
                
                <?php if($success): ?>
                    <div class="success-icon"></div>
                    
                    <h1>Ajout Réussi !</h1>
                    <p>Félicitations, <strong><?= htmlspecialchars($nomanim) ?></strong> a été ajouté(e) avec succès aux animations.</p>
                    
                    <div class="user-info">
                        Nom de l'animation : <strong><?= htmlspecialchars($nomanim) ?></strong><br>
                        Durée : <strong><?= htmlspecialchars($dureeanim) ?></strong>
                    </div>
                    
                    <a href="ajouteranimations.php" class="btn btn-submit" style="display: inline-block; text-decoration: none;">Ajouter une autre animation</a>
                    
                    <div class="redirect-timer">
                        Redirection automatique vers la page précédente dans <span id="timer">7</span> secondes...
                    </div>

                    <script>
                        let countdown = 7;
                        setInterval(function() {
                            countdown--;
                            document.getElementById('timer').textContent = countdown;
                            if(countdown <= 0) {
                                window.location.href = 'ajouteranimations.php';
                            }
                        }, 1000);
                    </script>

                <?php else: ?>
                    <div class="error-icon"></div>
                    
                    <h1 class="error-title">Erreur d'ajout</h1>
                    <p>Désolé, une erreur s'est produite lors de l'ajout de votre animation.</p>
                    
                    <div class="user-info" style="border-left-color: #e74c3c;">
                        Vérifiez que toutes les informations saisies sont correctes.
                    </div>
                    
                    <a href="ajouteranimations.php" class="btn btn-submit" style="background-color: #c0392b; display: inline-block; text-decoration: none; box-shadow: 0 4px 15px rgba(192, 57, 43, 0.4);">
                        Réessayer
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </div>

</body>
</html>
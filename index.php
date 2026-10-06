<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>      
            <h1>Bienvenue</h1>
            <p class="subtitle">Veuillez vous identifier pour accéder à votre espace.</p>

            <form action="login.php" method="post" class="login-form">
                <div class="input-group">
                <input type="text" name="user" placeholder="Identifiant" required>
                </div>

                <div class="input-group">
                <input type="text" name="mdp" placeholder="Mot de passe" required>
                </div>
            
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">S'identifier</button>
                    <button type="reset" class="btn btn-secondary">Annuler</button>
                </div>
            </form>
            
               
</body>
</html>

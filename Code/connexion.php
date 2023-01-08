<!DOCTYPE html>
<html>

<?php
	$title = 'Silemel&co Connexion';
	include 'include/ins_head.php';
?>

<!--Page de connection de l'utilisateur-->
<body>
    <main>
        <div class="login-page">
            <form action="verification_connexion.php" method="post" >
                <h2>Se connecter</h2>
                <div class="form-group col-md-12">
                    <br><br>
                    <input name="mail" type="email" class="form-control" placeholder="Email" require>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <input name="password" type="password"  class="form-control" placeholder="Mot de passe" require>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-info" type="submit" value="connexion">Se connecter</button><br> <br>
                </div>
                <div class="form-group col-md-12">
                    <!--Bouton pour aller sur la page d'inscritpion -->
                    <a href="Accueil_HC.php" class="btn btn-info" value="retour" >Annuler</a>
                    <button class="btn btn-info" value="inscription_Usr" formaction="inscription.php">Inscription</button>
                </div>
            </form>
        </div>
    <main>
</body>
</html>
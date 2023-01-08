<!DOCTYPE html>
<?php
$title = 'Silemen&co Mon Profil';
include 'include/head.php';
?>
<body>
    <?php 
    include 'include/headerC.php';
    require_once('include/bdd.php');
    session_start();
    ?>
    <div class="privE">
        <div class="contenu">
            <h1>Mon Profil</h1>
            <?php
                $email = $_SESSION['user'];
                $check = $bdd -> query("SELECT * FROM user WHERE email = '$email'");
                $data = $check -> fetch(PDO::FETCH_ASSOC);
                
                $id_c = $data['id'];
                $nom = $data['Nom'];
                $prenom = $data['Prenom'];
                $adresse = $data['adresse'];
                $num = $data['num_tel'];
                $email = $data['email'];
                $num_interim = $data['num_interim'];
            ?>
            <div class="sous-contenu">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nom"><h2>Nom : </h2><?php echo $nom; ?></label><br>
                        <label for="prenom"><h2>Prénom : </h2><?php echo $prenom; ?></label><br>
                        <label for="adresse"><h2>Votre adresse : </h2><?php echo $adresse; ?></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num"><h2>Votre numéro de téléphone : </h2><?php echo $num; ?></label><br>
                        <label for="num_interim"><h2>Votre numéro d'interimaire : </h2><?php echo $num_interim; ?></label>
                    </div> 
                </div>
            </div>
            <div class="sous-contenu"><hr>
                <h1>Mes candidatures</h1>
                    <?php
                        foreach ($bdd -> query("SELECT * FROM offres_candidat WHERE id_candidat = '$id_c'")as $data_oc){
                            $o = $data_oc['id_offre'];
                            $checker = $bdd -> query("SELECT * FROM offres WHERE id = '$o' ");
                            $donnee = $checker -> fetch(PDO::FETCH_ASSOC);

                            echo "<h2>".$donnee['intitule']."</h2>";
                            echo "<p>".$donnee['adresse'] . " - ".$donnee['type_contrat'] . "</p>";
                            echo"
                                <button class=\"open-button\" onclick=\"openForm('myForm,".$o."')\">En savoir plus.</button>
                                <main>
                                    <div class=\"form-popup\" id=\"myForm,".$o."\">
                                        <form class=\"form-container\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                                            <h2>".$donnee['intitule']."</h2>
                                            <div class=\"form-row\">
                                                <div class=\"form-group col-6\">
                                                    <div class=\"form-group col-md-12\">
                                                        <h1> Présentation de l'offre :</h1>".$donnee['presentation']."<br><br> <h1> Prérequis : </h1>".$donnee['prerequis']."
                                                    </div>
                                                </div>
                                                <div class=\"form-group col-6\">
                                                    <div class=\"form-group col-md-12\">
                                                        <h1> Profil recherché :</h1>".$donnee['profil']."<br><br> <h1> Lieu de travail :</h1>".$donnee['adresse']."<br> <br><h1> Durée : </h1>".$donnee['duree']."
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"button\">
                                                <button type=\"button\" class=\"btn btn-info\" onclick=\"closeForm('myForm,".$o."')\">Fermer</button>
                                            </div>
                                        </form>
                                    </div>
                                </main>
                                <hr>
                            ";
                        }
                    ?>
            </div>
            <a href="offres.php" class="btn btn-info" value="offre">Voir les offres</a>
        </div>
    </div>
</body>
<?php include "include/footC.php";?>

</html>
<script>
function openForm(x) {
  document.getElementById(x).style.display = "block";
}

function closeForm(x) {
  document.getElementById(x).style.display = "none";
}
</script>
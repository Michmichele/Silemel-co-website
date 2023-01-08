<!DOCTYPE html>
<?php
    $title = 'Silemen&co Mon Profil';
    include 'include/head.php';
?>

<body>
    <?php 
        include 'include/headerE.php';
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

                $nom_entreprise = $data['nom_entreprise'];
                $adresse = $data['adresse'];
                $num = $data['num_tel'];
                $email = $data['email'];
                $id_entreprise = $data['id'];

            ?>

            <div class="sous-contenu">    
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nom"><h2>Nom de votre entreprise : </h2> <?php echo $nom_entreprise; ?></label><br><br>
                        <label for="adresse"><h2>Votre adresse : </h2><?php echo $adresse; ?></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num"><h2>Votre numéro de téléphone :</h2><?php echo $num; ?></label>
                    </div>
                </div>
            </div>
            <hr>
            <h1>Vos offres</h1>
            <div class="sous-contenu">
                <?php
                    foreach ($bdd -> query("SELECT * FROM offres WHERE id_entreprise = '$id_entreprise'") as $data) {
                        echo "<h2>".$data['intitule']."</h2>";
                        echo "<p> ".$data['adresse'] . "\t - ".$data['type_contrat'] . "</p>";
                        echo "<p> - Profil : ".$data['profil']."\t<br> - Durée : ".$data['duree']."\t<br> - Présentation : ".$data['presentation']."\t<br> - Prérequis : ".$data['prerequis'];
                        $id_offre = $data['id'];

                        echo "
                            <div class=\"row\">
                                <div class=\"col\">
                                    <form action=\"\" method=\"post\">
                                    <button class=\"btn btn-info\" type=\"submit\" id=\"supp\" name=\"supp".$id_offre."\" value=\"supprimer l'offre\">Supprimer</button>
                                    </form>
                                </div>
                                <div class=\"col\">
                                    <button class=\"btn btn-info\" onclick=\"openForm('myForm,".$id_offre."')\">Modifer</button>
                                </div>
                            </div>";

                        if(isset($_POST['supp'.$id_offre])){
                            $checker = $bdd -> query("SELECT * FROM offres WHERE id = '$id_offre'");
                            $data = $checker -> fetch(PDO::FETCH_ASSOC);
                            $id = $data['id'];
                            $bdd -> query("DELETE FROM offres_candidat WHERE id_offre = '$id'");
                            $bdd -> query("DELETE FROM offres WHERE id = '$id' ");
                            header('Location:private_entreprise.php');
                        }
                        if(isset($_POST['modif'.$id_offre])){
                            $check_offre = $bdd -> query("SELECT * FROM offres WHERE id = '$id_offre'");
                            $info_of = $check_offre -> fetch(PDO::FETCH_ASSOC);

                            $ident = $info_of['id'];

                            $intitule = $info_of['intitule'];
                            $adresse = $info_of['adresse'];
                            $duree = $info_of['duree'];
                            $presentation = $info_of['presentation'];
                            $prerequis = $info_of['prerequis'];
                            $profil = $info_of['profil'];
                            $type_contrat = $info_of['type_contrat'];
                            
                            //On regarde quels élements ont été modifié et envoie la modification a la base de données
                            
                            //Pour l'intitulé 
                            if($_POST['intitule'] != $intitule){ 
                                $newIntit = $_POST['intitule'];
                                $bdd->exec("UPDATE offres SET intitule ='$newIntit' WHERE id = '$ident'");
                            }
                            
                            //Pour le profil 
                            if($_POST['profil'] != $profil){
                                $newProfil = $_POST['profil'];
                                $bdd->exec("UPDATE offres SET profil ='$newProfil' WHERE id = '$ident'");
                            }
                            
                            //Pour la presentation de l'offre 
                            if($_POST['presentation'] != $presentation){
                                $newPresent = $_POST['presentation'];
                                $bdd->exec("UPDATE offres SET presentation ='$newPresent' WHERE id = '$ident'");
                            }
                        
                            //Pour le type de contrat 
                            if($_POST['Contrat'] != $intitule){
                                $newTypCont = $_POST['Contrat'];
                                $bdd->exec("UPDATE offres SET type_contrat ='$newTypCont' WHERE id = '$ident'");
                            }
                        
                            //Pour l'adresse 
                            if($_POST['lieu'] != $adresse){
                                $newAdresse = $_POST['lieu'];
                                $bdd->exec("UPDATE offres SET adresse ='$newAdresse' WHERE id = '$ident'");
                            }
                        
                            //Pour la durée 
                            if($_POST['duree'] != $duree){
                                $newDuree = $_POST['duree'];
                                $bdd->exec("UPDATE offres SET duree ='$newDuree' WHERE id = '$ident'");
                            }
                            
                            //Pour les prerequis
                            if($_POST['prerequis'] != $prerequis){
                                $newPrereq = $_POST['prerequis'];
                                $bdd->exec("UPDATE offres SET prerequis ='$newPrereq' WHERE id = '$ident'");
                            }
                            header('Location:private_entreprise.php');
                        }

                        /*popup modification*/
                        echo "
                            <div class=\"liste-ajout\">
                                <div class=\"ajoutOffre\">
                                    <div class=\"modif-popup\" id=\"myForm,".$id_offre."\">
                                        <form class=\"modif-container\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                                            <h2>Modifier votre offre</h2><br>
                                            <div class=\"row\">
                                                <div class=\"form-group col-md-6\">
                                                    <p>Intitulé :</p>
                                                    <textarea class=\"descrip_offre\" name=\"intitule\">".$data['intitule']."</textarea></a><br>

                                                    <p>Le profil recherché : </p>
                                                    <textarea class=\"descrip_offre\" name=\"profil\">".$data['profil']."</textarea></a><br>

                                                    <p>Présentation : </p>
                                                    <textarea class=\"descrip_offre\" name=\"presentation\">".$data['presentation']."</textarea></a><br><br>
                                                    
                                                    <p>Type de contrat</p>
                                                    <select name=\"Contrat\" id=\"\">";
                                                        if($data['type_contrat'] == "CDI"){
                                                            echo "<option value=\"CDI\">CDI</option>";
                                                            echo "<option value=\"CDD\">CDD</option>";
                                                            echo "<option value=\"Mission\">Mission</option>";
                                                        }
                                                        if($data['type_contrat'] == "CDD"){
                                                            echo "<option value=\"CDD\">CDD</option>";
                                                            echo "<option value=\"CDI\">CDI</option>";
                                                            echo "<option value=\"Mission\">Mission</option>";
                                                        }
                                                        if($data['type_contrat'] == "Mission"){
                                                            echo "<option value=\"Mission\">Mission</option>";
                                                            echo "<option value=\"CDD\">CDD</option>";
                                                            echo "<option value=\"CDI\">CDI</option>";
                                                        }
                                                        echo "
                                                    </select>
                                                </div>
                                                <div class=\"form-group col-md-6\">
                                                    <p>Lieu de travail :</p>
                                                    <textarea name=\"lieu\">".$data['adresse']."</textarea>
                                                    
                                                    <p>Durée :</p>
                                                    <textarea name=\"duree\">".$data['duree']."</textarea>
                                                    
                                                    <p>Les prérequis :</p>
                                                    <textarea class=\"descrip_offre\" name=\"prerequis\">".$data['prerequis']."</textarea>
                                                    <br><br>
                                                    <button name=\"modif".$id_offre."\" class=\"btn btn-info\" type='submit' value=\"modifier_offre\">Je valide</button><br><br>
                                                    <button type=\"button\" class=\"btn btn-info\" onclick=\"closeForm('myForm,".$id_offre."')\">Annuler</button>
                                                </div>
                                            </div>
                                            
                                        </form><hr>
                                    </div>
                                </div>
                            </div>"
                        ;
                    }
                ?>
            </div>
            <a href="ajouter_offre.php" class="btn btn-info" value="ajouter_offre">Ajouter un offre</a>
        </div>
    </div>
</body>

<?php include "include/footE.php";?>
</html>

<script>
function openForm(x) {
  document.getElementById(x).style.display = "block";
}

function closeForm(x) {
  document.getElementById(x).style.display = "none";
}
</script>
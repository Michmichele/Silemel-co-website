<!DOCTYPE html>
<?php
    $title = 'Silemel&co Ajouter une offre';
    include 'include/head.php';
?>
<body>
    <?php include 'include/headerE.php';?>
    <div class="liste-ajout">
    <div class="ajoutOffre">    
        <form class="form_offre" action="verification_offre.php" method="post" enctype="multipart/form-data">
            <h2>Ajouter une offre</h2><br>
            <div class="row">
                <div class="form-group col-md-6">
                    <p>Intitulé :</p>
                    <textarea name="intitule" ></textarea></a><br>

                    <p>Présentation : </p>
                    <textarea name="presentation" ></textarea></a><br>

                    <p>Type de profil recherché : </p>
                    <textarea name="profil" ></textarea><br>
                   
                        <p>Type de contrat</p>
                        <select name="Contrat" id="">
                            <option value="CDI">CDI</option>
                            <option value="CDD">CDD</option>
                            <option value="Mission">Mission</option>
                        </select>
                    
                </div>
                <div class="form-group col-md-6">
                    <p>Lieu de travail :</p>
                    <textarea name="lieu"></textarea>
                    
                    <p>Durée :</p>
                    <textarea name="duree"></textarea>
                        
                    <p>Prérequis :</p>
                    <textarea name="prerequis"></textarea></a>
                    <br><br>
                    <button class="btn btn-info" type='submit' value="Ajout de l'offre">J'ajoute l'offre</button>
                    <a href="private_entreprise.php" class="btn btn-info" value="retour">Annuler</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

<?php include "include/footE.php";?>

</html>
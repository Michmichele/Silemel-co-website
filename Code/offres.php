<!DOCTYPE html>
<?php
  $title = 'Silemel&co Nos offres';
  include 'include/head.php';
?>

<body>
  <?php
      $title = 'Silemel&co Nos offres';
      include 'include/headerC.php';
      include 'include/bdd.php';
  ?>
  <div class="liste">
    <?php
      session_start();
      $email = $_SESSION['user'];
      $candidat = $bdd -> query("SELECT * FROM user WHERE email = '$email'");
      $data_c = $candidat -> fetch(PDO::FETCH_ASSOC);

      $id_c = $data_c['id'];


      foreach ($bdd -> query("SELECT * FROM offres ORDER BY id DESC") as $data) {
        $id_entreprise = $data['id_entreprise'];
        $entreprise = $bdd -> query ("SELECT * FROM user WHERE id = '$id_entreprise'");
        $data_entreprise = $entreprise -> fetch(PDO::FETCH_ASSOC);

        $identifiant = $data['id'];
        $intitule = $data['intitule'];
        $name = $data_entreprise['nom_entreprise'];
        $addresse = $data['adresse'];
        $duree = $data['duree'];
        $presentation = $data['presentation'];
        $prerequis = $data['prerequis'];
        $profil = $data['profil'];
        $type = $data['type_contrat'];

        echo "<div class=\"liste-offres\">";
        echo "<h2>".$data['intitule']." - ".$data_entreprise['nom_entreprise']."</h2>";
        echo "<p>".$data['adresse'] . " - ".$data['type_contrat'] . "</p>";

        echo"
          <button class=\"open-button\" onclick=\"openForm('myForm,".$identifiant."')\">En savoir plus.</button>
          <main>
                <div class=\"form-popup\" id=\"myForm,".$identifiant."\">
                  <form class=\"form-container\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                      <h2>".$intitule."</h2>
                    <div class=\"form-row\">
                      <div class=\"form-group col-6\">
                          <div class=\"form-group col-md-12\">
                              <h2> Présentation :</h2>".$presentation."<br><br> <h2> Prérequis : </h2>".$prerequis."
                          </div>
                      </div>
                      <div class=\"form-group col-6\">
                          <div class=\"form-group col-md-12\">
                              <h2> Profil recherché :</h2>".$profil."<br><br> <h2> Lieu de travail :</h2>".$addresse."<br> <br><h2> Durée : </h2>".$duree."
                          </div>
                      </div>
                    </div>
                    <div class=\"button\">
                      <button class=\"btn btn-info\" type=\"submit\" id=\"postuler\" name=\"postuler".$identifiant."\">Je postule!</button>
                      <button type=\"button\" class=\"btn btn-info\" onclick=\"closeForm('myForm,".$identifiant."')\">Fermer</button>
                    </div>
                  </form>
                </div>
          </main>
          
        ";
        
        
        if(isset($_POST["postuler".$identifiant])){
          $check = $bdd -> query("SELECT * FROM offres WHERE id = '$identifiant'");
          $checker = $bdd -> query("SELECT * FROM offres_candidat WHERE id_offre = '$identifiant' AND id_candidat = '$id_c'");

          if($checker -> rowCount() == 0){
            $data = $check -> fetch(PDO::FETCH_ASSOC);
            $id = $data['id'];
            $insert = $bdd -> query("INSERT INTO offres_candidat(id_candidat, id_offre) VALUES('$id_c', '$id')");
            header('Location:offres.php');
          }else{ echo "<p style='color:red'> Vous avez déjà postulé à cette offre.</p>";}
        }
        echo " <hr> </div>";
      }
    ?>
  </div>
</body>

<?php include "include/footC.php";?>

<script>
function openForm(x) {
  document.getElementById(x).style.display = "block";
}

function closeForm(x) {
  document.getElementById(x).style.display = "none";
}
</script>
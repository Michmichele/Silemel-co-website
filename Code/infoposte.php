<!--formulaire d'inscription qui pop-->
<?php
    include 'include/head.php';
?>
<button class="open-button" onclick="openForm('myForm')">En savoir plus.</button>
<main>
      <div class="form-popup" id="myForm">
        <form class="form-container" action="" method="post" enctype="multipart/form-data">
          <?php echo "<h2>".$data['intitule']."</h2>";?>
          <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-group col-md-12">
                   <?php echo "<h1> Presentation de l'offre :</h1>".$data['presentation']."<br><br> <h1> Prerequis : </h1>".$data['prerequis'];?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group col-md-12">
                    <?php echo "<h1> Profil recherché :</h1>".$data['profil']."<br>";
                          echo "<h1> Lieu de travail : </h1>".$data['adresse'];
                    ?>
                </div>
            </div>
          </div>
          <div class="row">
          <br>
          <button class="btn btn-info" type='submit' value="postuler">Je postule!</button>
                
                <!--bouton pour fermer le formulaire-->
                <button type="button" class="btn btn-info" onclick="closeForm('myForm')">Fermer</button>

          </div>

        </form>
      </div>
</main>
<script>
function openForm(x) {
  document.getElementById(x).style.display = "block";
}

function closeForm(x) {
  document.getElementById(x).style.display = "none";
}
</script>
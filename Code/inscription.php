<html>
  <?php
    $title = 'Silemel&co Inscription';
    include 'include/Ins_head.php';
  ?>
<body>
  
  <main>
    <div class="creation-compte">
      <h2>Inscription</h2><br>
      <form action="verification_inscription.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">

            <div class="form-group col-md-12">
              <label for="name">Nom</label>
              <input name="nom" type="nom" class="form-control" placeholder="Nom entreprise ou votre nom " require>
            </div>

            <div class="form-group col-md-12">
              <label for="mail">Email</label>
              <input name="mail" type="email" class="form-control" placeholder="Email" require>
            </div>
            <div class="form-group col-md-12">
              <label for="TelNb">Numéro de téléphone</label>
              <input name="num_tel" type="tel" class="form-control" placeholder="" size="30" minlength="9" maxlength="14" require>
            </div>
            
            <div class="form-group col-md-12">
              <label for="interimaire">Interimaire</label>
              <input type="radio" id="interimaire" name="role" checked value="1">
              <br>
              <label for="entreprise">Entreprise</label>
              <input type="radio" id="entreprise" name="role" value="2">
              
            </div>
        

          </div>
          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="prenom">Prénom</label>
              <input name="prenom" type="prenom" class="form-control" placeholder=" " require>
            </div>
            <div class="form-group col-md-12">
              <label for="address">Adresse</label>
              <input name="address" type="text" class="form-control" placeholder="Ex : 28 Avenue ..." require>
            </div>

            <div class="form-group col-md-12">
              <label for="pass">Créez un mot de passe</label>
              <input name="password" type="password" class="form-control" placeholder="" require>
            </div>

            <div class="form-group col-md-12">
              <br><button class="btn btn-info" type='submit' value="Je m'inscris">Je m'inscris</button>
              <a href="Accueil_HC.php" class="btn btn-info" value="retour" >Annuler</a>
            </div>

          </div>
        </div>
      </form>
    </div>
  <main>
    
</body>
</html>
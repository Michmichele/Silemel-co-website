<?php
    require_once('include/bdd.php');
    session_start();
    
    if( !empty($_POST['profil']) && !empty($_POST['Contrat']) && !empty($_POST['lieu']) && 
    !empty($_POST['intitule']) && !empty($_POST['presentation']) && !empty($_POST['prerequis'])){
        
        $intitule = htmlspecialchars($_POST['intitule']);
        $adresse = htmlspecialchars($_POST['lieu']);
        $type_contrat = htmlspecialchars($_POST['Contrat']);
        $profil = htmlspecialchars($_POST['profil']);
        $duree = htmlspecialchars($_POST['duree']);
        $presentation = htmlspecialchars($_POST['presentation']);
        $prerequis = htmlspecialchars($_POST['prerequis']);
        
        $email = $_SESSION['user'];
        $check = $bdd -> query("SELECT * FROM user WHERE email = '$email'");
        $data = $check -> fetch(PDO::FETCH_ASSOC);

        $id_entreprise = $data['id'];


        $insert = $bdd -> query("INSERT INTO offres(intitule, adresse, type_contrat, profil, duree, presentation, prerequis,id_entreprise)
                                VALUES ('$intitule','$adresse','$type_contrat','$profil','$duree','$presentation','$prerequis','$id_entreprise')");
        header('Location:private_entreprise.php');
             
    }else{echo "<p style='color:red'> Veuillez remplir tout les champs.</p>";}
?>
<?php
    require_once('include/bdd.php');

    if(isset($_POST['mail']) && isset($_POST['password'])){
        
        $email = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['password']);
        
        if($email !== "" && $mdp !== ""){
            if($check = $bdd -> query("SELECT * FROM user WHERE email = '$email' AND mdp = '$mdp'")){
                if($check -> rowCount() == 1){
                    session_start();
                    $data = $check -> fetch(PDO::FETCH_ASSOC);
                    $_SESSION['user'] = $data['email'];
                    $role = $data['role'];
                    if($role == 1){
                        header('Location:Accueil_Candidat.php');
                    }else{
                        header('Location:Accueil_Entreprise.php');
                    }
                    
                }
                else{
                    echo "<p style='color:red'> Email ou mot de passe incorrect.</p>";
                }
            }
        }

    }
?>
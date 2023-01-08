<?php
    require_once('include/bdd.php');

if( isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['nom']) &&
    isset($_POST['num_tel']) && isset($_POST['address']) && isset($_POST['role']) ){
        
    if($_POST['role'] == 1){
        //On initialise le role de l'interimaire
        $role = 1;
        $Nom = htmlspecialchars($_POST[ 'nom' ]);
        $Nom_entreprise = NULL;
        $Prenom = htmlspecialchars($_POST[ 'prenom' ]);
        $adresse = htmlspecialchars($_POST[ 'address' ]);
        $num_tel = htmlspecialchars($_POST[ 'num_tel' ]);
        $email = htmlspecialchars($_POST[ 'mail' ]);
        $num_interim = random_int(100000, 900000);
        $mdp = htmlspecialchars($_POST[ 'password' ]);
    }

    if($_POST[ 'role' ] == 2){
        //On initialise le role de l'entreprise
        $role = 2;
        $Nom = NULL;
        $Nom_entreprise = htmlspecialchars($_POST[ 'nom' ]);
        $Prenom = NULL;
        $adresse = htmlspecialchars($_POST[ 'address' ]);
        $num_tel = htmlspecialchars($_POST['num_tel']);
        $email = htmlspecialchars($_POST[ 'mail' ]);
        $num_interim = 000000;
        $mdp = htmlspecialchars($_POST['password']);
    }

    if ($check  = $bdd -> query("SELECT email FROM user WHERE email = '$email'")){
        if($check -> rowCount() == 0){
            if( filter_var($email, FILTER_VALIDATE_EMAIL) ){
                if( strlen($_POST['password']) > 6 && strlen($_POST['password']) < 12) {
                    if($insert = $bdd -> query("INSERT INTO user(Nom, Prenom, adresse, num_tel, email, num_interim, mdp, nom_entreprise, role) 
                                                VALUES ( '$Nom', '$Prenom', '$adresse', '$num_tel', '$email', '$num_interim', '$mdp', '$Nom_entreprise', '$role')") ){
                        $_SESSION[ 'user'] = $email;
                        header('Location:connexion.php');
                    }
                    else{ //Renvoie si l'inscription ne fonctionne pas
                        echo  "<p style='color:red'> Erreur lors de l'inscription.</p>";
                    }
                }
                else{ //Renvoie une erreur si le mot de passe est incorrect
                    echo  "<p style='color:red'> Le mot de passe doit être compris entre 6 et 12 caractères.</p>";
                }
            }
            else{ //Renvoie une erreur si le mail est invalide
                echo  "<p style='color:red'> Mail invalide.</p>";
            }
        }
        else{ //Renvoie une erreur si le mail est deja utilisé
            echo "<p style='color:red'> Mail déjà utilisé.</p>";
        }
    }

}
?>
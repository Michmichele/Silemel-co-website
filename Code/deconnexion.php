<?php
    session_start();

    session_destroy();

    header('Location:Accueil_HC.php');
?> 
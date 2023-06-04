<?php
  // Démarrer la session PHP
  session_start();

  // Vérifier si le bouton a été cliqué
 
    // Modifier la variable de session
    $_SESSION['user_id'] = 0;

    // Rediriger vers une autre page
    header('Location: index.php');
    exit;
  
  ?>

yes

<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Traitement du paiement</title>
</head>
<body>
  <h1>Traitement du paiement</h1>

  <?php
  // Vérification si le formulaire a été soumis
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $cardNumber = $_POST['cardNumber'];
    $cardHolder = $_POST['cardHolder'];
    $expirationDate = $_POST['expirationDate'];
    $cvv = $_POST['cvv'];

    // Connexion à la base de données (remplacez les valeurs par les vôtres)
     $servername = "localhost";
    $username = "id20852595_root";
    $password = "ProjetAgora2023@";
    $dbname = "id20852595_database1";

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
      die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour vérifier si la carte de paiement est enregistrée
    $sql = "SELECT * FROM Cb WHERE Numero = '$cardNumber' AND Nom = '$cardHolder' AND Date = '$expirationDate' AND CCV = '$cvv'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // La carte de paiement est enregistrée
      echo "Paiement réussi !";

      // Récupération de l'ID de l'utilisateur depuis les variables de session
     
      $userID = $_SESSION['user_id'];

      // Récupération de la date actuelle
      $date = date("Y-m-d");

      // Récupération du prix total et du nombre d'articles depuis les variables de session
      $totalPrice = $_SESSION['total_price'];
      $numItems = $_SESSION['num_items'];
      $idt = 0;

      // Requête pour enregistrer la transaction dans la table Transaction
      $sql = "INSERT INTO Transaction (Id,IdAcheteur,Date,Prix,NmbArticle) VALUES ('$idt','$userID', '$date', '$totalPrice', '$numItems')";
      if ($conn->query($sql) === TRUE) {
        echo "La transaction a été enregistrée avec succès.";
      } else {
        echo "Erreur lors de l'enregistrement de la transaction : " . $conn->error;
      }
    } else {
      // La carte de paiement n'est pas enregistrée
      echo "Échec du paiement. Veuillez vérifier les informations de la carte.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
  } else {
    echo "Formulaire non soumis.";
  }
  echo "<br><a href='index.php'>Retourner sur le site</a>";
  unset($_SESSION['cart']);
  ?>
</body>
</html>

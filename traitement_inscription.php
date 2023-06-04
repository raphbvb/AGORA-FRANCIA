<?php
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motdepasse = $_POST['motdepasse'];
$role = $_POST['role'];

// Connexion à la base de données
  $servername = "localhost";
    $username = "id20852595_root";
    $password = "ProjetAgora2023@";
    $dbname = "id20852595_database1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$photo = "test.png";

// Préparer la requête SQL pour l'insertion de l'utilisateur
$sql = "INSERT INTO User (Nom, Prenom, Email,Mdp,Type,Photo) VALUES ('$nom', '$prenom', '$email', '$motdepasse', '$role','$photo')";

if ($conn->query($sql) === TRUE) {
    echo "L'utilisateur a été enregistré avec succès.";
     echo "<br><a href='index.php'>Retourner sur le site</a>";
} else {
    echo "Erreur lors de l'enregistrement de l'utilisateur : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>

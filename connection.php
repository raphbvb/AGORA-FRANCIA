<?php
session_start(); // Démarrer la session

// Connexion à la base de données (remplacez les valeurs par celles de votre propre configuration)
$servername = "localhost";
$username = "id20852595_root";
$password = "ProjetAgora2023@";
$dbname = "id20852595_database1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Requête pour vérifier les identifiants de l'utilisateur
$sql = "SELECT Id FROM User WHERE Email = '$email' AND Mdp = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Identifiants corrects, récupère l'ID du profil
    $row = $result->fetch_assoc();
    
    // Lancement de la session et stockage de l'ID de connexion
    $_SESSION['user_id'] = $row['Id'];
    
    echo $row['Id'];
} else {
    // Identifiants incorrects
    echo '0';
}

// Fermeture de la connexion à la base de données
$conn->close();
?>


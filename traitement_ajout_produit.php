<?php
session_start();
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

// Récupération des données du formulaire
$nom = $_POST['nom'];
$categorie = $_POST['categorie'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$type_vente = $_POST['type_vente'];
$prix_depart = $_POST['prix_depart'];
$vendeur = $_SESSION['user_id'];

// Préparation de la requête d'insertion
$stmt = $conn->prepare("INSERT INTO Produit (Nom, Categorie, Description, Prix,Photo, TypeVente, PrixDepart,Vendeur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdssdi", $nom, $categorie, $description, $prix, $image, $type_vente, $prix_depart,$vendeur);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Le produit a été ajouté avec succès.";
      echo "<br><a href='index.php'>Retourner sur le site</a>";
} else {
    echo "Erreur lors de l'ajout du produit : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$stmt->close();
$conn->close();
?>

<?php
session_start();
// Récupérer les données du formulaire
$montantOffre = $_POST['prix'];

// Récupérer les données de session
$idProduit = $_SESSION['product_id'];
$idAcheteur = $_SESSION['user_id'];
$idVendeur = $_SESSION['vendeur'];

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

// Vérifier si l'offre est supérieure aux offres précédentes pour le même produit
$sql = "SELECT * FROM Offre WHERE IdPrdoduit = '$idProduit' ORDER BY Prix DESC LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $offrePrecedente = $row['Prix'];

    if ($montantOffre > $offrePrecedente) {
        // Enregistrement de la nouvelle offre dans la table "offre"
        $sql = "INSERT INTO Offre (Prix, IdPrdoduit,IdAcheteur, IdVendeur) VALUES ('$montantOffre', '$idProduit', '$idAcheteur', '$idVendeur')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouvelle offre enregistrée avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement de la nouvelle offre : " . $conn->error;
        }
    } else {
        echo "L'offre que vous avez faite n'est pas plus élevée que les offres précédentes.";
    }
} else {
    // Aucune offre précédente pour ce produit, enregistrement de la nouvelle offre
     $sql = "INSERT INTO Offre (Prix, IdPrdoduit,IdAcheteur, IdVendeur) VALUES ('$montantOffre', '$idProduit', '$idAcheteur', '$idVendeur')";
    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle offre enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de la nouvelle offre : " . $conn->error;
    }
}
 echo "<br><a href='index.php'>Retourner sur le site</a>";
// Fermeture de la connexion à la base de données
$conn->close();
?>

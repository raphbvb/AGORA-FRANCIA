<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styleIndex.css"/>
  <title>Catalogue</title>
  <style>
    /* Ajoutez vos styles personnalisés ici */
    .product {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-bottom: 20px;
      border: solid;
      margin: 50px;
      padding: 20px;
    }

    .product-image {
      width: 100px;
      height: 100px;
      margin-right: 20px;
    }

    .product-details {
      flex-grow: 1;
    }

    .product-name {
      font-weight: bold;
    }

    #mainCat {
      display: flex;
      flex-wrap: wrap;
    }
    
    #FilterCat
    {
        border:solid;
        margin: 10px;
        display: inline-block;
    }
    h1
    {
        color:black;
    }
    
   
  </style>
</head>
<body>

 <?php   include("entete.php");?>

 
    <?php
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

    // Requête pour récupérer toutes les catégories distinctes
    $sql = "SELECT DISTINCT Categorie FROM Produit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Affichage des catégories
      while ($row = $result->fetch_assoc()) {
        $category = $row["Categorie"];
        echo "<div id = FilterCat>";
        echo "<a href='catalogue.php?category=" . urlencode($category) . "' class='category-link'>" . $category . "</a>";
        echo"</div>";
        
      }
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
 

  <form method="GET" action="catalogue.php">
    <label for="min_price">Prix minimum :</label>
    <input type="number" name="min_price" id="min_price">

    <label for="max_price">Prix maximum :</label>
    <input type="number" name="max_price" id="max_price">

    <button type="submit">Filtrer</button>
  </form>
 <div id="mainCat">
  <?php
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

  // Requête de base pour récupérer tous les produits
  $sql = "SELECT * FROM Produit";

  // Ajout du filtre par catégorie si présent dans l'URL
  if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $sql .= " WHERE Categorie = '" . $category . "'";
  }

  // Ajout du filtre par prix si présent dans l'URL
  if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    $minPrice = $_GET['min_price'];
    $maxPrice = $_GET['max_price'];

    // Vérification que les valeurs sont des nombres valides
    if (is_numeric($minPrice) && is_numeric($maxPrice)) {
      // Ajout du filtre par prix dans la requête SQL
      $sql .= " WHERE Prix BETWEEN " . $minPrice . " AND " . $maxPrice;
    }
  }

  // Exécution de la requête SQL
  $result = $conn->query($sql);


if($result)
{
  if ($result->num_rows > 0) {
    // Affichage des produits
    while ($row = $result->fetch_assoc()) {
      echo "<a href='detail-produit.php?id=" . $row["Id"] . "' class='product'>";
      echo "<img class='product-image' src='Image/" . $row["Photo"] . "' alt='Product Image'>";
      echo "<div class='product-details'>";
      echo "<p class='product-name'>" . $row["Nom"] . "</p>";
      echo "<p>" . $row["Categorie"] . "</p>";
      echo "<p>" . $row["Prix"] . " €</p>";
      echo "</div>";
      echo "</a>";
    }
  }
  } else {
    echo "Aucun produit trouvé.";
  }

  // Fermeture de la connexion à la base de données
  $conn->close();
  ?>
</div>
  <footer>
    <p>Ceci est le footer de votre site.</p>
  </footer>
</body>
</html>

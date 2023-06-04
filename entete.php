<?php


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $servername = "localhost";
$username = "id20852595_root";
$password = "ProjetAgora2023@";
$dbname = "id20852595_database1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}



// Requête pour vérifier les identifiants de l'utilisateur
$sql = "SELECT * FROM User WHERE Id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    $row = $result->fetch_assoc();
    $type = $row['Type'];
    
   
}} else {
     $user_id = 0;
}

function getCartItemCount() {
  // Vérifie si la variable de session du panier existe
  if (isset($_SESSION['cart'])) {
    // Compte le nombre d'éléments dans le panier
    return count($_SESSION['cart']);
  } else {
    return 0; // Si le panier est vide, retourne 0
  }
}

// Utilisation de la fonction pour récupérer le nombre de produits dans le panier
$cartItemCount = getCartItemCount();

?>

<!DOCTYPE html>
<html>
<head>
  
   <link rel="stylesheet" href="styleIndex.css"/>
     <style>
   
    .navbar img {
      max-height: 40px;
      vertical-align: middle;
      cursor: pointer; 
      
      }
      nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

body
{
    background-color: rgb(247, 250, 193); 
  
}
    
  </style>
</head>

  <h1 style = "color:black;">AGORA FRANCIA</h1>
  
   


  <nav class = "navbar">
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li id="cata-link"><a href="catalogue.php">Catalogue</a></li>
      <li id="login-link"><a href="loginPage.php">Se connecter</a></li>
      <li id = "papa"><a href="panier.php"><img src="Image/paniers.png" alt="Description de l'image"></a></li>
      <p><?php echo $cartItemCount; ?> Items</p>
    </ul>
  </nav>
  
   <script>
    
    var userId = <?php echo $user_id; ?>;
    var type = '<?php echo $type; ?>';
    
   
    var loginLink = document.getElementById("login-link").querySelector("a");
     var CataLink = document.getElementById("cata-link").querySelector("a");
    
    // Vérification de la valeur de userId
    if (userId !== 0) {
      console.log(userId);
      loginLink.textContent = "Mon Compte";
      loginLink.href = "monCompte.php";
      
     
    }
     if(type == "vendeur")
      {
          console.log("oui");
         CataLink.textContent = "Ajouter un produit";
         CataLink.href = "addProduct.php";
       
      }
  
    
  </script>

  

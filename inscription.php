<html>
<head>
  <title>Inscription</title>
    <link rel="stylesheet" href="styleIndex.css"/>
  <style>
  
  
    #mainI
    {
        display:flex;
        flex-direction :column;
        align-items: center

    }
    
    form
    {
        display:flex;
        flex-direction : column;
        text-align :center;
    }
    
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
      
      
      
  </style>
</head>
<body>
    
     <?php   include("entete.php");?>
  
  <div id = mainI>
      
  <h1 style ="color:black;">Inscription</h1>
  <br><br>
  <form action="traitement_inscription.php" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="motdepasse">Mot de passe :</label>
    <input type="password" id="motdepasse" name="motdepasse" required><br>

    <label for="role">Choisissez votre rôle :</label><br>
    <input type="radio" id="vendeur" name="role" value="vendeur" required>
    <label for="vendeur">Vendeur</label><br>
    <input type="radio" id="acheteur" name="role" value="acheteur" required>
    <label for="acheteur">Acheteur</label><br>

    <input type="submit" value="S'inscrire">
  </form>
  
   </div>
</body>
</html>

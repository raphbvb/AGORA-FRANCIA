<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un produit</title>
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
  </style>
</head>

<body>
    <?php   include("entete.php");?>

<div id = mainI>
  <h1>Ajouter un produit</h1>
  
  <form action="traitement_ajout_produit.php" method="POST">
    <label for="nom">Nom du produit:</label>
    <input type="text" id="nom" name="nom" required><br><br>
    
    <label for="categorie">Catégorie:</label>
    <input type="text" id="categorie" name="categorie" required><br><br>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
    
    <label for="prix">Prix:</label>
    <input type="number" id="prix" name="prix" required><br><br>
    
    <label for="image">Nom de l'image:</label>
    <input type="text" id="image" name="image" required><br><br>
    
    <label for="type_vente">Type de vente:</label>
    <select id="type_vente" name="type_vente" required>
      <option value="normal">Vente normale</option>
      <option value="enchere">Enchère</option>
    </select><br><br>
    
    <div id="prix_depart_container">
      <label for="prix_depart">Prix de départ (pour enchère):</label>
      <input type="number" id="prix_depart" name="prix_depart">
    </div><br><br>
    
    <input type="submit" value="Ajouter le produit">
  </form>
  </div>
</body>
</html>

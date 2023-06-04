<!DOCTYPE html>
<html>

<head>
    <title>Exercice 2 - Liste des matchs</title>
    <meta charset="utf-8">
    
    <?php

    $database = "id19687904_project";
$db_handle = mysqli_connect('localhost','id19687904_joshua','6Ba#PfFfo<mG)n5O','id19687904_project');
$db_found = mysqli_select_db($db_handle, $database);

 if ($db_found) {
      
        $pokemonId1 = rand(1, 500);
        $sql = "SELECT * FROM all_pokemons WHERE pokemon_id = $pokemonId1";
        echo "SELECT * FROM all_pokemons WHERE pokemon_id = $pokemonId1";
        $result = mysqli_query($db_handle, $sql);
        $pokemon1 = mysqli_fetch_assoc($result);

       
       $pokemonId2 = rand(1, 500);
        $sql = "SELECT * FROM all_pokemons WHERE pokemon_id = $pokemonId2";
        $result = mysqli_query($db_handle, $sql);
        $pokemon2 = mysqli_fetch_assoc($result);



      
    }
    

   
    ?>
</head>

<body>
    <div id="container">
        <h1>Pokémon Arena</h1>
        <h2>Arena</h2>
        <div id="content-container">
            <!-- Afficher les images des pokémons sélectionnés aléatoirement ici -->

            <?php 

 echo "<div id='arena'>";
        echo "<div class='pokemon'><img src='pokemon_jpg/" . $pokemonId1 . ".jpg'  /></div>";
        echo " <progress value=".$pokemon1['hp']." max=".$pokemon1['hp']."> PV </progress>";

        
        
        echo "<div class='pokemon'><img src='pokemon_jpg/" . $pokemonId2 . ".jpg'  /></div>";
        echo " <progress value=".$pokemon2['hp']." max=".$pokemon2['hp']."> PV </progress>";
        
       
        echo "</div>";

             ?>
           
        </div>
    </div>
</body>

<?php
// On ferme la connexion à la base de données
mysqli_close($db_handle);
?>

</html>

<?php
session_start();

// Récupération des détails du produit à partir de la requête AJAX
$product = json_decode(file_get_contents('php://input'), true);

// Ajout du produit au panier dans la variable de session
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
$_SESSION['cart'][] = $product;

// Réponse AJAX
header('Content-type: application/json');
echo json_encode(array('message' => 'Le produit a été ajouté au panier.'));
?>

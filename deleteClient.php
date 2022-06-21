<?php
    include "connexion.php";
    
    // Récupérer l'id du client à supprimer
    $idClient = $_GET['id'];

    // Supprimer le client avec l'id récupéré
    // Préparer la requête SQL
    $sql = "DELETE FROM client WHERE id = $idClient";

    // Exécuter le requête
    $rep = $con->exec($sql);

    // Retourner vers la page clients.php
    header('Location:clients.php');
?>
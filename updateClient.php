<?php
    include "connexion.php";

    // Récupérer les informations du client à partir du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];

    // Récupérer l'identifiant du client
    $id_client = $_GET['idC'];

    // Préparer la requête de modification
    $sql = "UPDATE client 
            SET nom = '$nom', 
                prenom = '$prenom',
                datenaissance = '$dateN',
                adresse = '$adresse',
                tel = $tel
            WHERE id = $id_client";

    $reponse = $con->exec($sql);

    header('Location:clients.php');

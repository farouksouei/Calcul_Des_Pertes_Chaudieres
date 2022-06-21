<?php
  require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clients</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="icon-font/lineicons.css">
</head>
<body>
    <?php include_once 'templates/navbar.php' ?>
    <?php include 'connexion.php' ?>

    <div class="container">
        <?php
            if (!empty($_POST)) {
                // Récupérer les informations du client à partir du formulaire
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $dateN = $_POST['dateN'];
                $adresse = $_POST['adresse'];
                $tel = $_POST['tel'];

                // Ajouter le contenu dans la table client dans la BD
                // Préparer la requête d'insertion
                $sql = "INSERT INTO client (nom, prenom, datenaissance, adresse, tel) 
                        VALUES ('$nom', '$prenom', '$dateN', '$adresse', $tel)";
                // Envoyer la requête
                $reponse = $con->exec($sql);

                if ($reponse) {
                    echo '<div class="alert alert-success" role="alert">';
                        echo "Insertion efféctuée avec succès";
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">';
                        echo "Problème d'insertion du client";
                    echo '</div>';    
                }
            }
        ?>
        <hr>
        <fieldset>
            <legend><h2>Nouveau Client</h2></legend>
            <hr>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                    <div class="col-sm-7">
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom du client">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="prenom">Prénom</label>
                    <div class="col-sm-7">
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom du client">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="dateN">Date de naissance</label>
                    <div class="col-sm-7">
                        <input type="date" name="dateN" class="form-control" id="dateN" placeholder="Date de naissance">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
                    <div class="col-sm-7">
                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                    <div class="col-sm-7">
                        <input type="tel" name="tel" class="form-control" id="tel" placeholder="Numéro de téléphone">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label"> Contrat lu et accepté</label>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btValider" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

    <?php include 'templates/footer.html' ?>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
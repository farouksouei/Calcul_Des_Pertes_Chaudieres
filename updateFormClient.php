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
            // Récupérer l'id du client à supprimer
            $id_client = $_GET['id'];
                
            // Récupérer les infos du client à modifier
            $sql = "SELECT * FROM client WHERE id = $id_client";
            $reponse = $con->query($sql);

            $client = $reponse->fetch(PDO::FETCH_ASSOC);
        ?>
        <hr>
        <fieldset>
            <legend><h2>Modifier le client</h2></legend>
            <hr>
            <form action="updateClient.php?idC=<?= $id_client ?>" method="post">
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                    <div class="col-sm-7">
                        <input type="text" name="nom" class="form-control" id="nom" value="<?= $client['nom'] ?>" placeholder="Nom du client">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="prenom">Prénom</label>
                    <div class="col-sm-7">
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $client['prenom'] ?>" placeholder="Prénom du client">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="dateN">Date de naissance</label>
                    <div class="col-sm-7">
                        <input type="date" name="dateN" class="form-control" id="dateN" value="<?= $client['datenaissance'] ?>" placeholder="Date de naissance">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
                    <div class="col-sm-7">
                        <input type="text" name="adresse" class="form-control" id="adresse" value="<?= $client['adresse'] ?>" placeholder="Adresse">
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
                    <div class="col-sm-7">
                        <input type="tel" name="tel" class="form-control" id="tel" value="<?= $client['tel'] ?>" placeholder="Numéro de téléphone">
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
                <div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btValider" class="btn btn-secondary">Valider</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

    <?php include 'templates/footer.html' ?>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
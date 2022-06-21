<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="icon-font/lineicons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'connexion.php' ?>
    <?php
    // Récupérer le contenu du formulaire d'inscription
    if (!empty($_POST)) {
        //récupération des informations du formulaire
        // la fonctio  trim() permet de supprimer les espaces avant et après un texte
        $uname = trim($_POST['txt_uname']);
        $umail = trim($_POST['txt_umail']);
        $upass = trim($_POST['txt_upass']);

        //Remplissage des messages d'erreurs dans un tableau
        $errors = [];
        $valid = true;

        if ($uname == "") {    // Vérifier username
            array_push($errors, "Vous devez saisir un nom d'utilisateur!");
            $valid = false;
        }

        if ($umail == "") {   // Vérifier email
            array_push($errors, "Vous devez saisir un email");
            $valid = false;
        } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Vous devez saisir un email valide");
            $valid = false;
        }

        if ($upass == "") {    // Vérifier mot de passe
            array_push($errors, "Vous devez saisir un mot de passe");
            $valid = false;
        } else if (strlen($upass) < 6) {
            array_push($errors, "Le mot de passe doit avoir au moins 6 caractères");
            $valid = false;
        }

        // Il n'y a pas d'erreurs
        // ON recherche si l'utilisateur existe déjà dans la base
        // La recherche se fait par username ou email
        if ($valid) {
            // Requête SQL
            $sql = "SELECT * FROM users
                        WHERE user_name = '$uname' 
                        OR user_email = '$umail'";
            // Envoyer la requête au serveur et récupérer le résultat
            $reponse = $con->query($sql);

            //On récupère le résultat
            $user = $reponse->fetch(PDO::FETCH_ASSOC);

            //Si l'utilisateur existe on prépare les messages d'erreurs
            if ($user['user_name'] == $uname) {
                array_push($errors, "Désolé, le nom d'utilisateur existe déjà !");
            } else if ($user['user_email'] == $umail) {
                array_push($errors, "Désolé, l'email existe déjà !");
            } else {
                //si l'utilisateur n'existe pas alors on l'enregistre dans la BD
                // On prépare la requête
                $sql = "INSERT INTO users (user_name, user_email, user_pass)
                            VALUES ('$uname', '$umail', '$upass')";
                // Envoi et exécution de la requête
                $res = $con->exec($sql);
                // Si l'insertion est effectuée avec succès
                // On redérige l'utilisateur vers la page de login (connexion)

                if ($res) {
                    header('Location:index.php');
                }
            }
        }
    }
    ?>
    <div class="signin-form">
        <div class="container">
            <form method="post" class="form-signin">
                <h2 class="form-signin-heading">Inscription</h2>
                <hr />
                <?php
                // S'il existe des messages d'erreurs, on les affiches
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">';
                    foreach ($errors as $error) {
                        echo '<p><i class="lni lni-warning"></i> ' . $error . '</p>';
                    }
                    echo '</div>';
                }
                ?>
                <div class="row mb-1">
                    <input type="text" class="form-control" name="txt_uname" placeholder="Votre nom d'utilisateur" value="<?php ?>" />
                </div>
                <div class="row mb-1">
                    <input type="text" class="form-control" name="txt_umail" placeholder="Votre E-Mail" value="<?php ?>" />
                </div>
                <div class="row mb-3">
                    <input type="password" class="form-control" name="txt_upass" placeholder="Votre mot de passe" />
                </div>
                <div class="clearfix"></div>
                <div class="row mb-1">
                    <button type="submit" class="btn btn-primary" name="btn-signup">
                        <i class="lni lni-users"></i> S'inscrire
                    </button>
                </div>
                <br />
                <label>Déjà inscrit ! <a href="index.php">Connexion</a></label>
            </form>
        </div>
    </div>
</body>

</html>
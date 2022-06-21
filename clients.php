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
    <?php
    $resultat = 0;
    if (!empty($_POST)) {
        $TC = $_POST['TC'];

        $TA = $_POST['TA'];

        $A1 = $_POST['A1'];

        $B = $_POST['B'];

        $CO2 = $_POST['CO2'];

        $resultat = ($TC - $TA) * ($A1 / $CO2) + $B;
    }
    ?>

    <div class="container">
        <br>
        <div class="container">
            <h2>Les pertes de la combustion:</h2>
        </div>
        <hr>
        <div class="container">
            <h4>Les pertes de la combustion sont calculées selon la formule de Siegert :</h4>
        </div>
        <br>
        <h5 class="d-flex justify-content-center">(T<sub>carburant</sub>-T<sub>Ambiante</sub>)*(A1/CO<sub>2</sub>)+B <?php echo " = " . $resultat ?></h5>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label>T<sub>carburant</sub></label>
                <input type="text" name="TC" placeholder="Enter T Carburant" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>T<sub>Ambiante</sub></label>
                <input type="text" name="TA" placeholder="Enter T Carburant" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>A1</label>
                <input type="text" name="A1" placeholder="Enter A1" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>B</label>
                <input type="text" name="B" placeholder="Enter B" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>CO<sub>2</sub></label>
                <input type="text" name="CO2" placeholder="Enter CO2" class="form-control" value="">
            </div>
            <div class="form-group">
                <br>
                <button type="submit" name="save" class="form-control btn btn-dark">Calculer</button>

            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <h2>TABLEAU COMPARATIF :</h2>
        <br>
        <p>Le tableau ci-dessous présente les caractéristiques des différents combustibles fréquemment utilisés :</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Carburant</th>
                    <th>Fuel Num 2</th>
                    <th>Gas Oil</th>
                    <th>GPL</th>
                    <th>Butane</th>
                    <th>Propane</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Formule</th>
                    <th>-</th>
                    <th>C<sub>21</sub>H<sub>44</sub></th>
                    <th>C<sub>3</sub>H<sub>8</sub>C<sub>4</sub>H<sub>10</sub></th>
                    <th>C<sub>4</sub>H<sub>10</sub></th>
                    <th>C<sub>3</sub>H<sub>18</sub></th>

                </tr>
                <tr>
                    <th>Densité</th>
                    <th>950</th>
                    <th>845</th>
                    <th>2.32</th>
                    <th>2.703</th>
                    <th>2.008</th>
                </tr>
                <tr>
                    <th>PCI (Kcal/Kg)</th>
                    <th>9615</th>
                    <th>10270</th>
                    <th>2627</th>
                    <th>10890</th>
                    <th>11058</th>
                </tr>
                <tr>
                    <th>Température d'auto inflammation (°C)</th>
                    <th>300</th>
                    <th>250</th>
                    <th>superieur a 400</th>
                    <th>510</th>
                    <th>490</th>
                </tr>
                <tr>
                    <th>A1</th>
                    <th>0.61</th>
                    <th>-</th>
                    <th>0,42</th>
                    <th>0,475</th>
                    <th>0,475</th>
                </tr>
                <tr>
                    <th>A2</th>
                    <th>0,81</th>
                    <th>-</th>
                    <th>0,63</th>
                    <th>0,71</th>
                    <th>0,73</th>
                </tr>
                <tr>
                    <th>B</th>
                    <th>0</th>
                    <th>-</th>
                    <th>0,008</th>
                    <th>0</th>
                    <th>0</th>
                </tr>
                <tr>
                    <th>CO<sub>2</sub>Max</th>
                    <th>15.9</th>
                    <th>-</th>
                    <th>14</th>
                    <th>14.1</th>
                    <th>13,7</th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-dark" onclick="window.location.href='fume.php';">
            Voir Pertes Chaufferie
        </button>
    </div>
    <br>
    <br>
    <br>
    <br>

    <?php include 'templates/footer.html' ?>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
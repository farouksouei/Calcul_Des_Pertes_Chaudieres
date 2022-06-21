<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fume</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="icon-font/lineicons.css">
</head>

<body>
  <?php include_once 'templates/navbar.php' ?>
  <?php include 'connexion.php' ?>
  <?php
  $resultat = 0;
  if (!empty($_POST)) {
    $S = $_POST['TA'];


    $TC = $_POST['TA'];


    $TA = $_POST['A1'];

    $P = $_POST['B'];

    $resultat = 1200 * $S * ($TC / $TA) / $P;
  }
  ?>

  <div class="container">
    <br>
    <div class="container">
      <h2>1 : Les pertes par les Chaufferie :</h2>
    </div>
    <hr>
    <div class="container">
      <h4>Elles sont constituées principalement par les pertes au niveau de la porte foyère et dépendent de l’état et de l’âge de la chaudière</h4>
      <h6>1 à 6% pour les anciennes chaudières</h6>
      <h6>1 à 3% pour les nouvelles chaudières.</h6>
    </div>
    <h2>2 : Les pertes par Arret :</h2>
    <hr>
    <div class="container">
      <h4>Elles sont fonction de l’état du calorifugeage</h4>
      <h6> - 1 à 1,5 % pour les anciennes chaudières</h6>
      <h6> - 0,4 à 1% pour les nouvelles chaudières.</h6>
    </div>
    <h2>3 : Les pertes par Rayonnement :</h2>
    <hr>
    <div class="container">
      <h4>Elles correspondent aux échanges thermiques entre la surface extérieure et l'ambiance. Elles peuvent être calculées par la formule suivante :</h4>
      <h6> - S : surface extérieure [m²]</h6>
      <h6> - Tc -Ta : écart de température entre la face apparente (Tc) et l'ambiance (Ta),[°C] </h6>
      <h6> - P : puissance de la chaudière en [W].</h6>
    </div>
    <br>
    <h5 class="d-flex justify-content-center">P<sub>r</sub>[%] = 1200.S.(T<sub>c</sub>*T<sub>a</sub>)/P = <?php echo $resultat; ?></h5>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label>Surface S</label>
        <input type="text" name="TC" placeholder="Enter T Carburant" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>T<sub>Carburant</sub></label>
        <input type="text" name="TA" placeholder="Enter T Carburant" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>T<sub>Ambiante</sub></label>
        <input type="text" name="A1" placeholder="Enter A1" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>P</label>
        <input type="text" name="B" placeholder="Enter B" class="form-control" value="">
      </div>
      <div class="form-group">
        <br>
        <button type="submit" name="save" class="form-control btn btn-dark">Calculer</button>

      </div>
    </form>

    <p>P<sub>f</sub> : pertes par les fumées (en %) correspondant au pouvoir calorifique du combustible consommé ;</p>
    <p>k : Ce coefficient dépend de la nature de combustible.</p>
  </div>
  <div class="container">
  </div>
  <br>
  <br>
  <br>
  <br>

  <?php include 'templates/footer.html' ?>

  <script src="js/bootstrap.min.js"></script>
</body>

</html>
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
    $TC = $_POST['TA'];

    $TA = $_POST['TA'];

    $A1 = $_POST['A1'];

    $B = $_POST['B'];

    $resultat = $A1 * ($TC * $TA) / $B;
  }
  ?>

  <div class="container">
    <br>
    <div class="container">
      <h2>Les pertes par les fumées :</h2>
    </div>
    <hr>
    <div class="container">
      <h4>Une certaine quantité de chaleur est perdue dans les fumées. Les pertes dans les fumées peuvent être calculées par la formule suivante :</h4>
    </div>
    <br>
    <h5 class="d-flex justify-content-center">P<sub>f</sub>k*(T<sub>f</sub>*T<sub>a</sub>)/CO<sub>2</sub>% = <?= $resultat ?></h5>
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
        <label>PFK</label>
        <input type="text" name="A1" placeholder="Enter A1" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>CO2</label>
        <input type="text" name="B" placeholder="Enter B" class="form-control" value="">
      </div>
      <div class="form-group">
        <br>
        <button type="submit" name="save" class="form-control btn btn-dark">Calculer</button>

      </div>
    </form>
    <p>P<sub>f</sub> : pertes par les fumées (en %) correspondant au pouvoir calorifique du combustible consommé .</p>
    <p>k : Ce coefficient dépend de la nature de combustible.</p>
  </div>
  <div class="container">

    <h2>TABLEAU COMPARATIF :</h2>
    <br>
    <p>Le tableau ci-dessous présente les caractéristiques des différents combustibles fréquemment utilisés :</p>
    <table class="table">
      <thead>
        <tr>
          <th colspan="2">Combustible</th>
          <th>Coefficient k</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th rowspan="2">Gaz naturel</th>
          <th>Brûleur à air soufflé</th>
          <th>0,46</th>
        </tr>
        <tr>
          <th>Brûleur atmosphérique</th>
          <th>0,42</th>
        </tr>
        <tr>
          <th colspan="2">Propane - Butane</th>
          <th>0,5</th>
        </tr>
        <tr>
          <th colspan="2">Combustible liquide</th>
          <th>0,59</th>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    <button class="btn btn-dark" onclick="window.location.href='chaufferie.php';">
      click here
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
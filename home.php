<?php
require 'session.php';
require 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="icon-font/lineicons.css">

  <title>Home</title>
</head>

<body>
  <?php
  require 'templates/navbar.php';
  $fuel = 735;
  $Eau = 32;
  $Vapeur = 10934;
  if (!empty($_POST)) {
    $fuel = $_POST['fuel'];
    $Eau = $_POST['Eau'];
    $Vapeur = $_POST['Vapeur'];
    $sql = "SELECT * FROM element_chimique";
    $result = $con->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $nom_element = $row['nom_element'];
      $debit_massique = ($row['pourcentage']) * $fuel;
      $masse_molaire = $row['masse_molaire'];
      $debit_molaire = $debit_massique  / $masse_molaire;
      $sql = "UPDATE element_chimique SET debit_massique='$debit_massique',debit_molaire='$debit_molaire' WHERE nom_element='$nom_element'";
      $result = $con->query($sql);
    }

    $_SESSION['message'] = "Record has been added!";
    $_SESSION['msg_type'] = "success";
  }
  ?>


  <?php
  if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>

  <?php
  $sql = "SELECT * FROM element_chimique";
  $result = $con->query($sql);

  ?>

  <div class="container">
    <h2 class="my-3">Bilan énergitique de la chaudiére CH101/CH202</h2>
    <div></div>
    <table class="table">
      <thead>
        <tr>
          <th>Les éléments chimiques de fuel</th>
          <th>Pourcentage %</th>
          <th>Debit Massique</th>
          <th>Masse Molaire (kg/mol)</th>
          <th>Debit Molaire</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td><?php echo $row['nom_element']; ?></td>
            <td><?php echo $row['pourcentage'] * 100; ?>%</td>
            <td><?php echo $row['debit_massique']; ?></td>
            <td><?php echo $row['masse_molaire']; ?></td>
            <td><?php echo $row['debit_molaire']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
      <tfoot>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
          <th>Entrez le Debit Massique du fuel : </th>
          <th>
            100%
          </th>
          <th>
            <div class="form-group">
              <label>Debit Massique du fuel</label>
              <input type="text" name="fuel" placeholder="Enter Le Debit Massique du Fuel" class="form-control" value="<?php echo $fuel; ?>">
            </div>
          </th>
          <th>

          </th>

      </tfoot>
    </table>
  </div>
  <div class="container">
    <?php
    $sql = "SELECT * FROM element_chimique WHERE id_element=1";
    $result = $con->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Carbone = $row['debit_molaire'];
    $sql = "SELECT * FROM element_chimique WHERE id_element=2";
    $result = $con->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Hydrogene = $row['debit_molaire'];
    $sql = "SELECT * FROM element_chimique WHERE id_element=3";
    $result = $con->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Soufre = $row['debit_molaire'];
    $debitO2theorique = $Carbone + ($Hydrogene / 2) + $Soufre;
    $debitAirtheorique = $debitO2theorique * 0.21;
    $debitMassiqueAirtheorique = ($debitAirtheorique * 0.001) * (28.84);
    $debitAirReel = $debitMassiqueAirtheorique * (1 + 23);
    ?>
    <table class="table">
      <tbody>
        <tr>
          <td>Debit mollaire d'O<sup>2</sup> theorique (Mol/h)</td>
          <td><?php echo $debitO2theorique; ?></td>
        </tr>
        <tr>
          <td>Debit mollaire d'Air Theorique (Mol/h)</td>
          <td><?php echo $debitAirtheorique; ?></td>
        </tr>
        <tr>
          <td>Debit massique d'Air Theorique (Kg/h)</td>
          <td><?php echo $debitMassiqueAirtheorique; ?></td>
        </tr>
        <tr>
          <td>Exes d'air</td>
          <td>23 %</td>
        </tr>
        <tr>
          <td>Debit Air Reel (Kg/h)</td>
          <td><?php echo $debitAirReel; ?></td>
        </tr>
      </tbody>

    </table>
    <!-- define table -->
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>Debit Massique</th>
          <th>Enthalpie (Kcal/kg)</th>
          <th>Pouvoir Calorifique inferieur (Kcal/kg)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Eau</td>
          <td>
            <div class="form-group">
              <input type="text" name="Eau" placeholder="Enter Le Debit Massique du Le Eau" class="form-control" value="<?php echo $Eau; ?>">
            </div>
          </td>
          <td>116.23</td>
          <td></td>
        </tr>
        <tr>
          <td>Vapeur d'automisation</td>
          <td>102</td>
          <td>721.4</td>
          <td></td>
        </tr>
        <tr>
          <td>Vapeur haute pression</td>
          <td>
            <div class="form-group">
              <input type="text" name="Vapeur" placeholder="Enter Le Debit Massique du Vapeur" class="form-control" value="<?php echo $Vapeur; ?>">
            </div>
          </td>
          <td>777</td>
          <td>
            <div class="form-group">
              <button type="submit" name="save" class="form-control btn btn-primary">Submit</button>
            </div>
          </td>
        </tr>

        <tr>
          <td>Air</td>
          <td><?php echo $debitAirReel ?></td>
          <td>12.02</td>
          <td></td>
        </tr>
        <tr>
          <td>Fuel</td>
          <td><?php echo $fuel ?></td>
          <td></td>
          <td>9800</td>
        </tr>
      </tbody>
    </table>

    <?php
    $energie_introduite = ($Eau * 116.23) + (102 * 721.4) + ($debitAirReel * 12.02) + ($fuel * 9800);
    $energie_utile = $Vapeur * (777 - 116.23);
    $energie_perdue = $energie_introduite - $energie_utile;
    $rendement = $energie_utile / $energie_introduite;
    //remove decimal
    $rendement = number_format($rendement, 2, '.', '');
    $rendement = $rendement * 100;
    $consommation_specifique = $fuel / $Eau;
    ?>
    <table class="table my-4">
      <thead>
        <tr>

          <th>Energie Introduite</th>
          <th>Energie Utile</th>
          <th>Energie Perdue</th>
          <th>Rendement</th>
          <th>Consommation Specifique</th>
        </tr>
      </thead>
      <tbody>
        <tr>

          <td><?php echo $energie_introduite; ?></td>
          <td><?php echo $energie_utile; ?></td>
          <td><?php echo $energie_perdue; ?></td>
          <td><?php echo $rendement; ?></td>
          <td><?php echo $consommation_specifique; ?></td>
        </tr>
      </tbody>
    </table>
    < </div>
      <?php include 'templates/footer.html'; ?>
      </form>
</body>

</html>
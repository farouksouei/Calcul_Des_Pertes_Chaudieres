<?php
      try
      {
        // Connexion à la base de données
        $con = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8' , 'root' , '');
      } catch (Exception $e)
      {
        die('Erreur de connexion.' . $e->getMessage());
      }

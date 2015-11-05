<?php
  include('settings.php');
  include('content/template/predoctype.php');
?>
<!doctype html>
<html>
  <!--
    Ludothèque - Projet piscine IG3
    Par des étudiants de Polytech Montpellier en Informatique et Gestion (IG)
    Github / contact : https://github.com/KenAlin/piscineig3
  -->

  <head>
    <title>Ludothèque &bull; Accueil</title>
    <?php include('content/template/html_head.php'); ?>
  </head>

  <body>
    <?php include('content/template/core_header.php'); ?>
    <form>
      Pseudo <input type="text" name="pseudo">
      Mot de passe <input type="password" name="pass">
    </form>
    <div>
      

  </body>
</html>

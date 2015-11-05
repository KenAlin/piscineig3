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
    <section>
      <form>
        <label for="pseudo" class="labelConnexion">Pseudo</label><input type="text" name="pseudo"><br>
        <label for="pass" class="labelConnexion">Mot de passe</label><input type="password" name="pass">
        <br>

        <input type="submit">
      </form>
    </section>
    <?php include('content/template/footer.php'); ?>
  </body>
</html>

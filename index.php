<?php
  include('settings.php');
  $path_ludo = "http://wave-it.fr/beta/piscine/beta_20/";
  include('content/template/predoctype.php');

?>
<!doctype html>
<html>
  <head>
    <title>Ludothèque &bull; <?php echo $titrePage; ?></title>
    <?php include('content/template/html_head.php'); ?>
  </head>

  <body>
    <?php include('content/template/header.php'); ?>
    <section>
      <?php if ($messageUtilisateur) { echo "<div class=\"messageUtilisateur message_{$messageImportance}\">$messageUtilisateur</div>"; }
      include($cheminModuleVue); ?>
    </section>
    <?php include('content/template/footer.php'); ?>
  </body>
</html>

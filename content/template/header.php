<header>
  <div id="header_bandeau">
    <a href="."><img id="logo" src="content/img/logo.png"></a>
  </div>

  <div id="header_menu">
    <?php if ($estConnecte) { ?>
      <a href="#">Catalogue de jeux</a>
      <?php if ($estAdmin) { ?>
        <a href="#">Accès admin</a>
        <a href="#">Réservations</a>
        <a href="#">Prêts</a>
      <?php } else { ?>
        <a href="#">Réserver</a>
      <?php }
    } else { ?>
      <a href=".">Connectez-vous !</a>
    <?php } ?>
  </div>

</header>

<div class="row">
  <div class="col s12">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-bars"></i></h2>
      <h2 class="center">Exemplaires du jeu <a href="jeu-<?php echo $jeuDemande; ?>"><i><?php echo $infosJeu["nom"]; ?></i></a></h5>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12 m9 center">&nbsp;</div>
  <div class="col s12 m3 center">
    <a class="btn blue waves-effect waves-light" href="creerExemplaire-<?php echo $infosJeu["id"]; ?>">Ajouter un exemplaire  <i class="fa fa-plus"></i></a>
  </div>
</div>

<?php if (!$listeExemplaires) { ?>
  <div class="row">
    <div class="col s12 m3 center">&nbsp;</div>
    <div class="col s12 m6">
      <div class="card pink lighten-3 hoverable">
        <div class="card-content">
          <p>Pas d'exemplaire trouvé pour ce jeu !</p>
        </div>
      </div>
    </div>
    <div class="col s12 m3 center">&nbsp;</div>
  </div>
<?php }
else { ?>
  <div class="row">
    <?php foreach ($listeExemplaires as $exemplaire) { ?>
      <div class="col s12 m6">
        <div class="card light-blue lighten-3 hoverable">
          <div class="card-content">
            <span class="card-title">Exemplaire #<?php echo $exemplaire["idEx"]; ?></span>
            <ul>
              <li><i class="fa fa-barcode"></i> <b>Code barre :</b> <?php echo $exemplaire["code_barre"]; ?></li>
              <li><i class="fa fa-commenting-o"></i> <b>Commentaires :</b> <?php echo $exemplaire["commentaire"]; ?></li>
            </ul>
          </div>
          <div class="card-action">
            <a class="green-text text-darken-3" href="editExemplaire-<?php echo $exemplaire["idEx"]; ?>">Modifier</a>
            <a class="green-text text-darken-3" href="supprExemplaire-<?php echo $exemplaire["idEx"]; ?>">Supprimer</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php } ?>

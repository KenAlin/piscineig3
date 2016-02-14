<div class="row">
  <div class="col s12">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h2 class="center"><?php echo $infosJeu["nom"]; ?></h5>
    </div>
  </div>
</div>

<?php if ($estAdmin) { ?>
<div class="row">
  <div class="col s12 m9 center">&nbsp;</div>
  <div class="col s12 m3 center">
    <a class="btn red waves-effect waves-light" href="supprJeu-<?php echo $infosJeu["id"]; ?>">Supprimer ce jeu <i class="fa fa-close"></i></a>
  </div>
</div>
<?php } ?>

<div class="row">
  <div class="col s12 m6">
    <div class="card blue lighten-2 hoverable">
      <div class="card-content">
        <span class="card-title">Informations</span>
        <ul>
          <li><?php echo "<b>Année :</b> ".$infosJeu["année"]; ?></li>
          <li><?php echo "<b>Editeur :</b> ".$infosJeu["éditeur"]; ?></li>
          <li><?php echo "<b>Âge recommandé :</b> ".$infosJeu["age"]." ans"; ?></li>
          <li><?php echo "<b>Nombre de joueurs conseillés :</b> ".$infosJeu["nb_joueurs"]; ?></li>
        </ul>
      </div>
      <div class="card-action">
        <?php if (!$estAdmin) { ?>
          <a class="green-text text-darken-3" href="reserver-<?php echo $jeuDemande;?>">Réserver</a>
        <?php } ?>
        <?php if ($estAdmin) { ?>
          <a class="green-text text-darken-3" href="editJeu-<?php echo $jeuDemande; ?>">Modifier la fiche</a>
          <a class="green-text text-darken-3" href="creerJeu-<?php echo $jeuDemande; ?>">Nouvelle extension</a>
          <a class="green-text text-darken-3" href="exemplaires-<?php echo $jeuDemande; ?>">Gestion des exemplaires</a>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="col s12 m6">
    <div class="card amber lighten-2 hoverable">
      <div class="card-content">
        <span class="card-title">À propos</span>
        <p><?php echo "<b>Genre :</b> ".$nomCatJeu; ?></p>
        <p><?php echo $infosJeu["description"]; ?></p>
      </div>
    </div>
  </div>
</div>

<?php if ($aDesExtensions) {
  // Le jeu a des extensions : on affiche cette partie de la page
?>

<div class="row">
  <div class="col s12">
    <h3 class="center">Extensions</h5>
  </div>
</div>

  <?php foreach ($extensions as $ext) { ?>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue lighten-2 hoverable">
          <div class="card-content">
            <span class="card-title"><?php echo $ext["nom"]; ?></span>
            <ul>
              <li><b>Année :</b> <?php echo $ext["année"]; ?></li>
              <li><b>Editeur :</b> <?php echo $ext["éditeur"]; ?></li>
              <li><b>Âge recommandé :</b> <?php echo $ext["age"]." ans"; ?></li>
              <li><b>Nombre de joueurs conseillés :</b> <?php echo $ext["nb_joueurs"]; ?></li>
            </ul>
          </div>
          <div class="card-action">
            <?php if (!$estAdmin) { ?>
              <a class="green-text text-darken-3" href="reserver-<?php echo $ext["id"];?>">Réserver</a>
            <?php } ?>
            <?php if ($estAdmin) { ?>
              <a class="green-text text-darken-3" href="exemplaires-<?php echo $ext["id"]; ?>">Gestion des exemplaires</a>
              <a class="green-text text-darken-3" href="editJeu-<?php echo $ext["id"]; ?>">Modifier la fiche</a>
              <a class="green-text text-darken-3" href="supprJeu-<?php echo $ext["id"]; ?>">Supprimer l'extension</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col s12 m6">
        <div class="card amber lighten-2 hoverable">
          <div class="card-content">
            <span class="card-title">À propos</span>
            <p><?php echo $ext["description"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

<?php } ?>

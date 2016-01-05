<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-shopping-basket"></i></h2>
      <h5 class="center">Emprunts en cours</h5>
      <p class="light center">Il y a actuellement <?php echo $compteEmprunts; ?> emprunts en cours.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
<?php foreach($listeEmpruntsEnCours as $emprunts) { ?>
  <div class="col s12 m4">
    <div class="card <?php echo choixCouleur($emprunts["dateFin"] < time()); ?> lighten-2">
      <div class="card-content">
        <span class="card-title"><?php echo $emprunts["nom"]; ?></span>
        <ul>
          <li><b>Emprunté par</b> <?php echo $emprunts["pseudo"]; ?> le <?php echo strftime("%A %e %B %Y", $emprunts["dateDebut"]); ?></li>
          <li><b>Date de retour prévue : </b> <?php echo strftime("%A %e %B %Y", $emprunts["dateFin"]); ?></li>
          <?php if($emprunts["dateFin"] < time()) echo "<li class=\"blue-text text-darken-2\"><b>Prêt en retard !</b></li>"; ?>
        </ul>

      </div>
      <div class="card-action">
        <a href="emprunt-<?php echo $emprunts["idEmprunt"]; ?>" class="white-text accent-4">Informations emprunt</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>

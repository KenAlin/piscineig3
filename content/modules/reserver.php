<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-shopping-basket"></i></h2>
      <h5 class="center">Réserver un jeu</h5>
      <p class="light center">Vous vous apprétez à réserver un exemplaire du jeu <?php echo $infosJeu["nom"]; ?>.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<?php if ($onPeutReserver) { ?>
  <form action="reserver-<?php echo $idJeuAReserver; ?>" method="post">
    <input type="hidden" name="action" value="resa">

    <div class="row">
      <div class="col s12 l3">&nbsp;</div>
      <div class="col s12 l6">
        <div class="card lime lighten-4">
          <div class="card-content">
            <span class="card-title">Saisie de réservation</span>
            <p>Veuillez vérifier les informations saisies, et cliquer sur "confirmer".</p>
            <ul>
              <li><b>Nom du jeu : </b><?php echo $infosJeu["nom"]; ?></li>
              <li><b>Date limite de retrait : </b><?php echo strftime("%A %e %B %Y", (time() + $settings["nbJoursReservation"]*24*60*60)); ?></li>
            </ul>
            <div class="input-field">
              <input type="checkbox" class="filled-in" name="engagement" value="1" id="formEngage">
              <label for="formEngage" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Une réservation non tenue gêne le bon fonctionnement de la ludothèque. Veuillez, s'il-vous-plaît, ne réserver que si vous êtes sûr de pouvoir retirer le jeu !">Je m'engage à venir retirer le jeu d'ici la date ci-indiquée</label>
            </div>
            <br>
          </div>

          <div class="card-action">
            <button class="btn blue waves-effect waves-light" type="submit">Confirmer</button>
          </div>
        </div>
      </div>
      <div class="col s12 l3">&nbsp;</div>
    </div>

  </form>
<?php } else { ?>
  <div class="row">
    <div class="col s12 l3">&nbsp;</div>
    <div class="col s12 l6">
      <div class="card lime lighten-4">
        <div class="card-content">
          <span class="card-title">Réservation impossible !</span>
          <p><?php echo $messageUtilisateur; ?></p>
        </div>

        <div class="card-action">
          <a href="jeu-<?php echo $idJeuAReserver; ?>" class="btn blue waves-effect waves-light" type="submit">Retour au jeu</a>
        </div>
      </div>
    </div>
    <div class="col s12 l3">&nbsp;</div>
  </div>
<?php } ?>

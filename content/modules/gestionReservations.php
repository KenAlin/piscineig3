<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>

  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-cube"></i></h2>
      <h5 class="center">Réservations en cours</h5>
      <p class="light center">Il y a actuellement <?php echo $compteReservations; ?> réservation(s) de jeux en cours.</p>
    </div>
  </div>

  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">

<?php foreach($listeReservationsEnCours as $reservation) { ?>
  <div class="col s12 m4">
    <div class="card blue lighten-2">
      <div class="card-content">
        <span class="card-title"><?php echo $reservation["nom"] ; ?></span>
        <ul>
          <li><b>Réservation de</b> <?php echo $reservation["pseudo"]; ?></li>

          <li><b>Date de la réservation : </b> <?php echo strftime("%A %e %B %Y", $reservation["dateDebut"]); ?></li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>
</div>

<div class="row">
  <div class="col s12 m12 l7">
    <div class="card grey lighten-2">
      <div class="card-content">
        <span class="card-title">Informations membre : <?php echo $profil["pseudo"]; ?></span>
        <p><i>Ces informations sont celles renseignées dans notre base de données. Pour tout changement, nous vous invitons à contacter un responsable de la ludothèque.</i></p>
        <ul>
          <?php if($profil["estAdmin"]) echo "<li class=\"red-text text-darken-2\"><b>Compte administrateur !</b></li>"; ?>
          <?php if($profil["fin_abo"] < time()) echo "<li class=\"blue-text text-darken-2\"><b>Adhésion invalide à ce jour !</b></li>"; ?>
          <li><i class="fa fa-dashboard"></i> <b>Numéro de compte :</b> <?php echo $profil["id"]; ?></li>
          <li><i class="fa fa-calendar-o"></i> <b>Membre depuis</b> le <?php echo strftime("%A %e %B %Y", $profil["membre_depuis"]); ?></li>
          <li><b>Nom :</b> <?php echo $profil["nom"]; ?></li>
          <li><b>Prénom :</b> <?php echo $profil["prenom"]; ?></li>
          <li><i class="fa fa-envelope-o"></i> <b>Mail de contact :</b> <?php echo $profil["mail"]; ?></li>
          <li><i class="fa fa-phone"></i> <b>Téléphone :</b> <?php echo $profil["telephone"]; ?></li>
          <li><i class="fa fa-ticket"></i> <b>Adhérent jusqu'au </b> <?php echo strftime("%A %e %B %Y", $profil["fin_abo"]); ?></li>
          <?php if($nbPretsRetard > 0) echo "<br><li class=\"red-text text-darken-2\">{$nbPretsRetard} prêt(s) en retard cumulé !</li>"; ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="col s12 m12 l5">
    <div class="card light-blue lighten-2">
      <div class="card-content">
        <span class="card-title">Prêt en cours</span>
        <ul>
          <?php foreach ($listePrets as $pret) { ?>
            <li><?php echo $pret["nom"]; ?> pour le <?php echo strftime("%A %e %B %Y", $pret["dateFin"]); ?></li>
          <?php } ?>
        </ul>

        <span class="card-title">Réservation en cours</span>
        <ul>
          <?php foreach ($listeResa as $resa) { ?>
            <li><?php echo $resa["nom"]; ?>, d'ici le <?php echo strftime("%A %e %B %Y", $resa["dateFin"]); ?></li>
          <?php } ?>
        </ul>
      </div>
      <div class="card-action">
        <?php if ($estAdmin) { ?>
          <a class="green-text text-darken-3" href="editProfil-<?php echo $profil["id"]; ?>">Modifier le profil</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

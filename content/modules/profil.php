<div class="row">
  <div class="col s12 m12 l7">
    <div class="card grey">
      <div class="card-content">
        <span class="card-title">Informations membre : <?php echo $profil["pseudo"]; ?></span>
        <p><i>Ces informations sont celles renseignées dans notre base de données. Pour tout changement, nous vous invitons à contacter un responsable de la ludothèque.</i></p>
        <ul>
          <?php if($profil["estAdmin"]) echo "<li class=\"red-text text-darken-2\"><b>Compte administrateur !</b></li>"; ?>
          <li><b>Numéro de compte :</b> <?php echo $profil["id"]; ?></li>
          <li><b>Nom :</b> <?php echo $profil["nom"]; ?></li>
          <li><b>Prénom :</b> <?php echo $profil["prenom"]; ?></li>
          <li><b>Mail de contact :</b> <?php echo $profil["mail"]; ?></li>
          <li><b>Téléphone :</b> <?php echo $profil["telephone"]; ?></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col s12 m12 l5">
    <div class="card light-blue">
      <div class="card-content">
        <span class="card-title">Prêt en cours</span>
        <p><?php //if ($exemplaire["idEx"] == $emprunts["idExemplaire"]) echo $exemplaire["Nom"]; else echo "Pas de prêt en cours"?>Liste des prêts en cours ici.</p>
          <!-- Test certainement ridicule de php de ma part ^^ -->

        <span class="card-title">Réservation en cours</span>
        <p>Liste des réservations en cours ici.</p>
      </div>
    </div>
  </div>
</div>

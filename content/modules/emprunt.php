<div class="row">
  <div class="col s12 m12 l7">
    <div class="card grey lighten-2">
      <div class="card-content">
        <span class="card-title">Prêt #<?php echo $pret["idEmprunt"]; ?></span>
        <ul>
          <?php if(!isset($pret["dateRetour"]) && $pret["dateFin"] < time()) echo "<li class=\"blue-text text-darken-2\"><b>Prêt en retard !!</b></li>"; ?>

          <li><i class="fa fa-dashboard"></i> <b>Exemplaire :</b> <a href="exemplaires-<?php echo $infosJeu["id"]; ?>"><?php echo $pret["idExemplaire"]; ?></a> du jeu <a href="jeu-<?php echo $infosJeu["id"]; ?>"><?php echo $infosJeu["nom"]; ?></a></li>

          <li><b>Emprunté par</b> <a href="profil-<?php echo $emprunteur["id"]; ?>"><?php echo $pret["pseudo"]; ?></a> le <?php echo strftime("%A %e %B %Y", $pret["dateDebut"]); ?></li>

          <li><b>Date de retour prévue : </b> <?php echo strftime("%A %e %B %Y", $pret["dateFin"]); ?></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col s12 m12 l5">
    <div class="card teal lighten-4">
      <div class="card-content">
        <?php if(isset($pret["dateRetour"])) {
          $strDateRetour = strftime("%A %e %B %Y", $pret["dateRetour"]);
          echo "<p class=\"red-text text-darken-2\"><b>Prêt rendu le {$strDateRetour}.</b></p>";
        } else { ?>
          <form action="emprunt-<?php echo $pret["idEmprunt"]; ?>" method="post">
            <input type="hidden" name="action" value="retour">
            <div class="input-field">
              <input type="checkbox" class="filled-in" name="retourOk" value="1" id="formRetour">
              <label for="formRetour">Document retourné</label>
            </div>
            <br>
            <button class="btn blue waves-effect waves-light" type="submit">Confirmer le retour</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

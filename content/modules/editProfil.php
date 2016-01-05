<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center teal-text"><i class="fa fa-edit"></i></h2>
      <h5 class="center">Modifier un profil de membre</h5>
      <p class="light center">Depuis ce menu, vous pouvez modifier les informations relatives à un membre.<br>
      <a class="green-text text-darken-3" href="profil-<?php echo $profilDemande;?>">Retour au profil</a></p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <form action="editProfil-<?php echo $profilDemande; ?>" method="post">
    <input type="hidden" name="action" value="edit">
    <div class="col s12 l7">
      <div class="card cyan lighten-4">
          <div class="card-content">
            <span class="card-title">Modifier le membre <i><?php echo $infosUser["pseudo"]; ?></i></span>
            <div class="input-field">
              <input id="formNom" type="text" name="nom" value="<?php echo $infosUser["nom"]; ?>">
              <label for="formNom">Nom</label>
            </div>
            <div class="input-field">
              <input id="formPrenom" type="text" name="prenom" value="<?php echo $infosUser["prenom"]; ?>">
              <label for="formPrenom">Prénom</label>
            </div>
            <div class="input-field">
              <input id="formMail" type="email" name="mail" value="<?php echo $infosUser["mail"]; ?>">
              <label for="formMail">Mail</label>
            </div>
            <div class="input-field">
              <input id="formTelephone" type="tel" name="telephone" value="<?php echo $infosUser["telephone"]; ?>">
              <label for="formTelephone">Téléphone de contact</label>
            </div>

          </div>
          <div class="card-action">
            <button class="btn blue waves-effect waves-light" type="submit">Modifier le profil</button>
            <a class="green-text text-darken-3" href="profil-<?php echo $profilDemande;?>">Retour</a>
          </div>


      </div>
    </div>
    <div class="col s12 l5">
      <div class="card lime lighten-4">
          <div class="card-content">
            <span class="card-title">Propriétés</span>
            <p>Par mesure de sécurité, vous ne pouvez pas vous passer vous-même en simple membre.</p>
            <p>Adhésion valide jusqu'au <?php echo strftime("%A %e %B %Y", $infosUser["fin_abo"]); ?></p>
            <div class="input-field">
              <input type="checkbox" class="filled-in" name="admin" value="1" id="formAdmin" <?php if ($infosUser["estAdmin"]) echo 'checked="checked"'; ?>>
              <label for="formAdmin">Est administrateur</label>
            </div>
            <br>
            <div class="input-field">
              <select id="formRenouvellement" type="text" name="renouvellement">
                <option value="0" selected>Conserver tel quel</option>
                <option value="1">Fin dans un an (365 jours)</option>
                <option value="2">Fin en fin d'année civile <?php echo date("Y"); ?></option>
                <option value="3">Fin en fin d'année prochaine <?php echo date("Y")+1; ?></option>
                <option value="6">Supprimer l'adhésion</option>
              </select>
              <label>Date de fin de l'adhésion</label>
            </div>
          </div>
      </div>
    </div>
  </form>
</div>

<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-shopping-basket"></i></h2>
      <h5 class="center">Enregistrer un nouveau prêt</h5>
      <p class="light center">Saisissez le code-barre de l'exemplaire à prêter, ou scannez-le.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<?php if ($contexte == 2) { ?>
  <form action="nouveauPret" method="post">
    <input type="hidden" name="action" value="confirm">
    <input type="hidden" name="code_barre" value="<?php echo $postCB; ?>">
    <input type="hidden" name="emprunteur" value="<?php echo $postPseudo; ?>">
    <input type="hidden" name="duree" value="<?php echo $postDuree; ?>">

    <div class="row">
      <div class="col s12 l3">&nbsp;</div>
      <div class="col s12 l6">
        <div class="card lime lighten-4">
          <div class="card-content">
            <span class="card-title">Confirmation demandée</span>
            <p>Veuillez vérifier les informations saisies, et cliquer sur "confirmer".</p>
            <ul>
              <li><b>Code barre exemplaire : </b><?php echo $postCB; ?></li>
              <li><b>Nom du jeu : </b><?php echo $infosJeu["nom"]; ?></li>
              <br>
              <li><b>Emprunteur : </b><?php echo $postPseudo; ?></li>
              <?php if ($infosUser["fin_abo"] < time() + 3600*24*$postDuree) { ?>
                <li class="red-text"><b>L'adhésion sera terminée avant la date de retour prévue !!</b></li>
              <?php } ?>
              <br>
              <li><b>Durée du prêt : </b><?php echo $postDuree; ?> jours</li>
            </ul>
          </div>

          <div class="card-action">
            <button class="btn blue waves-effect waves-light" type="submit">Confirmer</button>
          </div>
        </div>
      </div>
      <div class="col s12 l3">&nbsp;</div>
    </div>

  </form>
<?php } ?>


<?php if ($contexte < 2) { ?>
  <form action="nouveauPret" method="post">
    <input type="hidden" name="action" value="shop">

    <!-- Formulaire 1 : Saisie CB -->
    <div class="row">
      <div class="col s12 l3">&nbsp;</div>
      <div class="col s12 l6">
        <div class="card brown lighten-4">
          <div class="card-content">
            <span class="card-title">Nouveau prêt</span>

              <!-- Formulaire 1 : Saisie CB -->
              <div class="input-field">
                <input id="formCB" type="text" name="code_barre" <?php if ($contexte == 0) echo "autofocus"; else echo "value=\"$postCB\""; ?>>
                <label for="formCB">Code barre</label>
              </div>

              <?php if ($contexte >= 1) { ?>
                <!-- Formulaire 2 : Saisie pseudo de l'emprunteur -->
                <div class="input-field">
                  <input id="formPseudo" type="text" name="pseudo" <?php if ($contexte == 1) echo "autofocus"; else echo "value=\"$postPseudo\""; ?>
                    data-autocomplete="content/remote/autoPseudo" data-autocomplete-no-result="Aucun pseudo correspondant !" data-autocomplete-param-name="uc">
                  <label for="formPseudo">Pseudo de l'emprunteur</label>
                </div>

                <!-- Formulaire 3 : Saisie du nombre de jours d'emprunt possibles -->
                <div class="input-field">
                  <input id="formDuree" type="text" name="duree" value="<?php if ($postDuree) echo $postDuree; else echo $settings["nbJoursPretsDefaut"]; ?>">
                  <label for="formDuree">Durée de l'emprunt (en jours)</label>
                </div>

                <p>Les emprunts sont de <?php echo $settings["nbJoursPretsDefaut"]; ?> jours par défaut, et d'au maximum <?php echo $settings["nbJoursMaxPrets"]; ?> jours.<br>Les administrateurs de la ludothèque ne sont pas concernés par la limite de jeux.</p>

                <div class="input-field">
                  <input type="checkbox" class="filled-in" name="forcePret" value="1" id="formForcePret" <?php if ($postForcePret) echo 'checked="checked"'; ?>>
                  <label for="formForcePret" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Autorise le prêt même si l'adhésion n'est plus valable ou si le nombre de prêts maximum est dépassé">Forcer le prêt (?)</label>
                </div>
                <br>

              <?php } ?>

          </div>
          <div class="card-action">
            <button class="btn blue waves-effect waves-light" type="submit">Etape suivante →</button>
          </div>
        </div>
      </div>
      <div class="col s12 l3">&nbsp;</div>
    </div>

  </form>
<?php } ?>

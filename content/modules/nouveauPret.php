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
              <div class="input-field">
                <input type="checkbox" class="filled-in" name="forcePret" value="1" id="formForcePret" <?php if ($postForcePret) echo 'checked="checked"'; ?>>
                <label for="formForcePret" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Autorise le prêt même si l'adhésion n'est plus valable ou si le nombre de prêts maximum est dépassé">Forcer le prêt (?)</label>
              </div>
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

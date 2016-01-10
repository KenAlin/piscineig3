<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center red-text"><i class="fa fa-close"></i></h2>
      <h5 class="center">Supprimer un exemplaire</h5>
      <p class="light center">Vous vous apprêtez à supprimer un exemplaire de jeu. Attention, cette opération est irréversible ! Pour confirmer, cochez simplement la case. Cette opération n'est possible que si l'exemplaire n'est pas en cours de prêt.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card grey lighten-1">
      <form action="supprExemplaire<?php if ($idExemplaireSuppr) echo "-{$idExemplaireSuppr}"; ?>" method="post">
        <input type="hidden" name="action" value="suppr">
        <div class="card-content">
          <span class="card-title">Supprimer un exemplaire</span>
          <p>Rappel des informations :</p>
          <ul>
            <li><b>Exemplaire #<?php echo $idExemplaireSuppr; ?> du jeu <a href="jeu-<?php echo $infosJeu["id"]; ?>"><?php echo $infosJeu["nom"]; ?></a></b></li>
            <li><b>Code barre :</b> <?php echo $infosExmpl["code_barre"]; ?></li>
            <li><b>Commentaire :</b> <?php echo $infosExmpl["commentaire"]; ?></li>
          </ul>
          <div class="input-field">
            <input type="checkbox" class="filled-in" name="confirm" value="1" id="formConfirm">
            <label for="formConfirm">Confirmer la suppression</label>
          </div>
          <br>
        </div>
        <div class="card-action">
          <button class="btn red waves-effect waves-light" type="submit">Supprimer l'exemplaire</button>
        </div>
      </form>
    </div>
  </div>
</div>

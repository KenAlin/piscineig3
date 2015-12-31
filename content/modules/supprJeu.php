<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center red-text"><i class="fa fa-close"></i></h2>
      <h5 class="center">Supprimer un jeu</h5>
      <p class="light center">Vous vous apprêtez à supprimer un jeu. Attention, cette opération est irréversible ! Pour confirmer, saisissez le nom du jeu (<i><?php echo $nomJeu; ?></i>). Cette opération n'est possible que si l'ensemble des exemplaires et extensions du jeu sont supprimés auparavant.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card grey lighten-1">
      <form action="supprJeu<?php if ($idJeuSuppr) echo "-{$idJeuSuppr}"; ?>" method="post">
        <input type="hidden" name="action" value="suppr">

        <div class="card-content">
          <span class="card-title">Supprimer une fiche de jeu</span>
          <div class="input-field">
            <input id="formNom" type="text" name="nom">
            <label for="formformNomPseudo">Nom du jeu</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn red waves-effect waves-light" type="submit">Supprimer le jeu</button>
        </div>

      </form>
    </div>
  </div>
</div>

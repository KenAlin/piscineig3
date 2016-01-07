<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center red-text"><i class="fa fa-close"></i></h2>
      <h5 class="center">Supprimer un exemplaire</h5>
      <p class="light center">Vous vous apprêtez à supprimer un jeu. Attention, cette opération est irréversible ! Pour confirmer, saisissez le nom du jeu (<i><?php echo $idExemplaire; ?></i>). Cette opération n'est possible que si l'ensemble des exemplaires et extensions du jeu existent.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card grey lighten-1">
      <form action="supprJeu<?php if ($idExtensionSuppr) echo "-{$idExtensionSuppr}"; ?>" method="post">
        <input type="hidden" name="action" value="suppr">

        <div class="card-content">
          <span class="card-title">Supprimer une exemplaire</span>
          <div class="input-field">
            <input id="formNom" type="text" name="nom">
            <label for="formNom">Nom du jeu</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn red waves-effect waves-light" type="submit">Supprimer l'exemplaire</button>
        </div>

      </form>
    </div>
  </div>
</div>

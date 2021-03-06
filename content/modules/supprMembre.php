<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center red-text"><i class="fa fa-close"></i></h2>
      <h5 class="center">Supprimer un membre</h5>
      <p class="light center">Vous vous apprêtez à supprimer un membre. Attention, cette opération est irréversible ! Pour confirmer, saisissez le pseudo du membre (<i><?php echo $pseudoMembre; ?></i>). Cette opération n'est possible que si le membre n'a pas de prêts ou réservations en cours.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card grey lighten-1">
      <form action="supprMembre<?php if ($idUserSuppr) echo "-{$idUserSuppr}"; ?>" method="post">
        <input type="hidden" name="action" value="suppr">

        <div class="card-content">
          <span class="card-title">Supprimer un membre</span>
          <div class="input-field">
            <input id="formPseudo" type="text" name="pseudo">
            <label for="formPseudo">Pseudo du membre</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn red waves-effect waves-light" type="submit">Supprimer le membre</button>
        </div>

      </form>
    </div>
  </div>
</div>

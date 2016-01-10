<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center teal-text"><i class="fa fa-key"></i></h2>
      <h5 class="center">Modifier son mot de passe</h5>
      <p class="light center">Depuis ce menu, vous pouvez modifier votre mot de passe.<br>
      <a class="green-text text-darken-3" href="profil">Retour au profil</a></p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <form action="editMdp" method="post">
    <input type="hidden" name="action" value="edit">
    <div class="col s12">
      <div class="card amber lighten-4">
          <div class="card-content">
            <span class="card-title">Modifier le mot de passe</span>
            <div class="input-field">
              <input id="formAncienMdp" type="password" name="ancienMdp">
              <label for="formAncienMdp">Mot de passe actuel</label>
            </div>
            <div class="input-field">
              <input id="formNouveauMdp" type="password" name="nouveauMdp">
              <label for="formNouveauMdp">Nouveau mot de passe</label>
            </div>
            <div class="input-field">
              <input id="formConfirmNouveauMdp" type="password" name="confirmMdp">
              <label for="formConfirmNouveauMdp">Confirmer le nouveau mot de passe</label>
            </div>

          </div>
          <div class="card-action">
            <button class="btn blue waves-effect waves-light" type="submit">Modifier</button>
            <a class="green-text text-darken-3" href="profil">Retour</a>
          </div>


      </div>
    </div>
  </form>
</div>

<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center teal-text"><i class="fa fa-edit"></i></h2>
      <h5 class="center">Modifier un exemplaire</h5>
      <p class="light center">Depuis ce menu, vous pouvez modifier les informations relatives à un exemplaire de jeu.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card indigo lighten-4">
      <form action="editExemplaire-<?php echo $exmplDemande; ?>" method="post">
        <input type="hidden" name="action" value="edit">
        <div class="card-content">
          <span class="card-title">Modifier l'exemplaire #<?php echo $exmplDemande; ?></span>
          <div class="input-field">
            <input id="formCB" type="text" name="code_barre" value="<?php echo $infosExmpl["code_barre"]; ?>">
            <label for="formCB">Code barre</label>
          </div>
          <div class="input-field">
            <textarea id="formComment" class="materialize-textarea" name="commentaire"><?php echo $infosExmpl["commentaire"]; ?></textarea>
            <label for="formComment">Commentaire sur l'exemplaire (mauvais état, manque une pièce, etc)</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn blue waves-effect waves-light" type="submit">Modifier la fiche</button>
        </div>

      </form>
    </div>
  </div>
</div>

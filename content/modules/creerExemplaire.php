<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-plus-square"></i></h2>
      <h5 class="center">Ajouter un exemplaire</h5>
      <p class="light center">Depuis ce menu, vous pouvez ajouter un exemplaire pour le jeu <a href="jeu-<?php echo $jeuDemande; ?>"><i><?php echo $infosJeu["nom"]; ?></i></a>.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12 l6">
    <div class="card lime lighten-4">
      <form action="creerExemplaire-<?php echo $jeuDemande; ?>" method="post">
        <input type="hidden" name="action" value="create">

        <div class="card-content">
          <span class="card-title">Ajouter un exemplaire</span>
          <div class="input-field">
            <input id="formCB" type="text" name="code_barre">
            <label for="formCB">Code barre</label>
          </div>
          <div class="input-field">
            <textarea id="formComment" class="materialize-textarea" name="commentaire">Bon état.</textarea>
            <label for="formComment">Commentaire sur l'exemplaire (mauvais état, manque une pièce, etc)</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn green waves-effect waves-light" type="submit">Ajouter l'exemplaire</button>
        </div>
      </form>
    </div>
  </div>
</div>

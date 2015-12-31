<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center teal-text"><i class="fa fa-edit"></i></h2>
      <h5 class="center">Modifier un jeu</h5>
      <p class="light center">Depuis ce menu, vous pouvez modifier les informations relatives à un jeu.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card indigo lighten-4">
      <form action="editJeu-<?php echo $jeuDemande; ?>" method="post">
        <input type="hidden" name="action" value="edit">

        <div class="card-content">
          <span class="card-title">Modifier le jeu <?php echo $infosJeu["nom"]; ?></span>
          <div class="input-field">
            <select id="formCat" type="text" name="categorie">
              <?php foreach ($listeCategories as $categorie) { ?>
                <option value="<?php echo $categorie["id_cat"]; ?>" <?php if ($categorie["id_cat"] == $infosJeu["cat"]) echo "selected"; ?>><?php echo $categorie["nom"]; ?></option>
              <?php } ?>
            </select>
            <label for="formCat">Catégorie</label>
          </div>
          <div class="input-field">
            <input id="formAnnee" type="text" name="annee" value="<?php echo $infosJeu["année"]; ?>">
            <label for="formAnnee">Année</label>
          </div>
          <div class="input-field">
            <input id="formEditeur" type="text" name="editeur" value="<?php echo $infosJeu["éditeur"]; ?>">
            <label for="formEditeur">Editeur</label>
          </div>
          <div class="input-field">
            <input id="formAge" type="text" name="age" value="<?php echo $infosJeu["age"]; ?>">
            <label for="formAge">Tranche d'âge</label>
          </div>
          <div class="input-field">
            <input id="formNbJ" type="text" name="nbjoueurs" value="<?php echo $infosJeu["nb_joueurs"]; ?>">
            <label for="formNbJ">Nombre de joueurs</label>
          </div>
          <div class="input-field">
            <textarea id="formDesc" class="materialize-textarea" name="desc"><?php echo $infosJeu["description"]; ?></textarea>
            <label for="formDesc">Description</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn blue waves-effect waves-light" type="submit">Modifier la fiche</button>
        </div>

      </form>
    </div>
  </div>
</div>

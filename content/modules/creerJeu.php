<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h5 class="center">Créer un nouveau jeu</h5>
      <p class="light center">Depuis ce menu, vous pouvez créer un nouveau jeu. Attention : un jeu est unique, et un nom de jeu n'appartient qu'à un seul jeu.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card yellow lighten-2">
      <form action="creerJeu<?php if ($parentNouvJeu) echo "-{$parentNouvJeu}"; ?>" method="post">
        <input type="hidden" name="action" value="create">

        <div class="card-content">
          <span class="card-title">Créer une fiche de jeu</span>
          <div class="input-field">
            <input id="formNom" type="text" name="nom">
            <label for="formformNomPseudo">Nom du jeu</label>
          </div>
          <div class="input-field">
            <select id="formCat" type="text" name="categorie">
              <?php foreach ($listeCategories as $categorie) { ?>
                <option value="<?php echo $categorie["id_cat"]; ?>" <?php if ($categorie["id_cat"] == 0) echo "selected"; ?>><?php echo $categorie["nom"]; ?></option>
              <?php } ?>
            </select>
            <label for="formCat">Catégorie</label>
          </div>
          <div class="input-field">
            <input id="formAnnee" type="text" name="annee">
            <label for="formPsformAnneeeudo">Année</label>
          </div>
          <div class="input-field">
            <input id="formEditeur" type="text" name="editeur">
            <label for="formEditeur">Editeur</label>
          </div>
          <div class="input-field">
            <input id="formAge" type="text" name="age">
            <label for="formAge">Tranche d'âge</label>
          </div>
          <div class="input-field">
            <input id="formNbJ" type="text" name="nbjoueurs">
            <label for="formNbJ">Nombre de joueurs</label>
          </div>
          <div class="input-field">
            <textarea id="formDesc" class="materialize-textarea" name="desc"></textarea>
            <label for="formDesc">Description</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn green waves-effect waves-light" type="submit">Créer le jeu</button>
        </div>

      </form>
    </div>
  </div>
</div>

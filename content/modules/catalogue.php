<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h5 class="center">Feuilletez le catalogue</h5>
      <p class="light center">Nous avons plus de <?php echo $compteJeux; ?> références de jeux à vous proposer !</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12 m3 l3 center">
    <!-- AFFICHAGE BOUTON CATEGORIES -->
    <ul id="dropdownCat" class="dropdown-content">
      <?php foreach ($listeCategories as $categorie) { if ($categorie["id_cat"] == 0) { $categorie["nom"] = "Toutes"; } if (nbJeuxHorsExt($categorie["id_cat"]) > 0) { ?>
        <li><a href="catalogue-<?php echo $categorie["id_cat"]; ?>"><?php echo $categorie["nom"]; ?></a></li>
      <?php } } ?>
    </ul>
    <a class="btn dropdown-button green lighten-1" href="#" data-activates="dropdownCat">Catégorie <i class="mdi-navigation-arrow-drop-down right"></i></a>
  </div>

  <div class="input-field col s12 m6 l6 valign-wrapper">
    <!-- AFFICHAGE BARRE RECHERCHE -->
    <form class="">
      <i class="material-icons prefix">search</i>
      <input id="recherche" type="text" class="validate"
        data-autocomplete="content/remote/autoCatalogue"
        data-autocomplete-no-result="Aucun jeu correspondant !"
        data-autocomplete-param-name="uc"
        autocomplete="off">
      <label for="recherche">Chercher un jeu</label>
    </form>
  </div>

  <?php if ($estAdmin) { ?>
    <div class="col s12 m3 l3 center">
      <a class="btn blue waves-effect waves-light" href="creerJeu">Ajouter un jeu <i class="fa fa-plus-circle"></i></a>
    </div>
  <?php } ?>
</div>


<div class="row">
<?php foreach($listeJeux as $jeu) { ?>
  <div class="col s12 m4">
    <div class="card <?php echo choixCouleur($jeu["nom"].$jeu["année"]); ?> lighten-2">
      <div class="card-content">
        <span class="card-title"><?php echo $jeu["nom"]; ?></span>
        <?php if(strlen($jeu["description"]) > 200) $suffixe_desc = " [...]"; else $suffixe_desc = ""; ?>
        <p><?php echo substr($jeu["description"], 0, 200).$suffixe_desc; ?></p>
      </div>
      <div class="card-action">
        <a href="jeu-<?php echo $jeu["id"]; ?>" class="white-text accent-4">Fiche du jeu</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>

<div class="row center">
  <ul class="pagination">
    <li class="<?php if($pageDemande == 1) echo "disabled"; else echo "waves-effect"; ?>">
      <a href="catalogue-<?php echo $catDemandee; ?>-<?php echo $pageDemande-1; ?>"><i class="fa fa-chevron-left"></i></a>
    </li>

    <?php for($i=1 ; $i<=$nbPagesCatalogue ; $i++) { ?>
      <li class="<?php if($pageDemande == $i) echo "active ".choixCouleur($i, true); else echo "waves-effect"; ?>">
        <a href="catalogue-<?php echo $catDemandee; ?>-<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php } ?>

    <li class="<?php if($pageDemande == $nbPagesCatalogue) echo "disabled"; else echo "waves-effect"; ?>">
      <a href="catalogue-<?php echo $catDemandee; ?>-<?php echo $pageDemande+1; ?>"><i class="fa fa-chevron-right"></i></a>
    </li>
  </ul>
</div>

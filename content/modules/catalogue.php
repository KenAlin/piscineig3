<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h5 class="center">Feuilletez le catalogue</h5>
      <p class="light center">Nous avons plus de <?php echo $compteJeux; ?> références de jeux et extensions à vous proposer !</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12 m3 l3 center">
    <!-- AFFICHAGE BOUTON CATEGORIES -->
    <ul id="dropdownCat" class="dropdown-content">
      <li><a href="5">Stratégie<span class="badge">222</span></a></li>
      <li><a href="5">Cartes<span class="badge">222</span></a></li>
      <li><a href="5">Famille<span class="badge">222</span></a></li>
    </ul>
    <a class="btn dropdown-button green lighten-1" href="#" data-activates="dropdownCat">Par catégorie <i class="mdi-navigation-arrow-drop-down right"></i></a>
  </div>

  <div class="input-field col s12 m3 l3 valign-wrapper">
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
      <a href="catalogue--1"><i class="fa fa-chevron-left"></i></a>
    </li>

    <?php for($i=1 ; $i<=$nbPagesCatalogue ; $i++) { ?>
      <li class="<?php if($pageDemande == $i) echo "active ".choixCouleur($i, true); else echo "waves-effect"; ?>">
        <a href="catalogue--<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php } ?>

    <li class="<?php if($pageDemande == $nbPagesCatalogue) echo "disabled"; else echo "waves-effect"; ?>">
      <a href="catalogue--<?php echo $nbPagesCatalogue; ?>"><i class="fa fa-chevron-right"></i></a>
    </li>
  </ul>
</div>

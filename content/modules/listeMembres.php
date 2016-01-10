<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h5 class="center">Liste des membres</h5>
      <p class="light center">Texte</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
<?php foreach($listeMembres as $membre) { ?>
  <div class="col s12 m4">
    <div class="card gray lighten-2">
      <div class="card-content">
        <span class="card-title"><?php echo $membre["pseudo"]; ?></span>
        <p><?php echo $membre["nom"]; ?></p>
      </div>
      <div class="card-action">
        <a href="#" class="black-text accent-4">Fiche du membre</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>

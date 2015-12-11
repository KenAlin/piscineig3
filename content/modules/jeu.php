<div class="row">
  <div class="col s12">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h2 class="center"><?php echo $infosJeu["nom"]; ?></h5>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12 m6">
    <div class="card blue lighten-2 hoverable">
      <div class="card-content">
        <span class="card-title">Informations</span>
        <ul>
          <li><?php echo "<b>Année :</b> ".$infosJeu["année"]; ?></li>
          <li><?php echo "<b>Editeur :</b> ".$infosJeu["éditeur"]; ?></li>
          <li><?php echo "<b>Âge recommandé :</b> ".$infosJeu["age"]." ans"; ?></li>
          <li><?php echo "<b>Nombre de joueurs conseillés :</b> ".$infosJeu["nb_joueurs"]; ?></li>
        </ul>
      </div>
      <div class="card-action">
        <a class="green-text text-darken-3" href="#">Réserver</a>
      </div>
    </div>
  </div>

  <div class="col s12 m6">
    <div class="card amber lighten-2 hoverable">
      <div class="card-content">
        <span class="card-title">À propos</span>
        <p><?php echo "<b>Genre :</b> ".$infosJeu["cat"]; ?></p>
        <p><?php echo $infosJeu["description"]; ?></p>
      </div>
    </div>
  </div>
</div>

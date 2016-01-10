<div class="row">
  <div class="col s12 m4 l4">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-puzzle-piece"></i></h2>
      <h5 class="center">Feuilleter le catalogue</h5>
      <p class="light">Nous avons plus de <?php echo $compteJeux; ?> références de jeux et extensions à vous proposer ! Parmis eux, nous sommes sûrs que vous trouverez votre bonheur.</p>
    </div>
  </div>

  <div class="col s12 m3 l4">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-shopping-cart"></i></h2>
      <h5 class="center">Réserver des jeux</h5>
      <p class="light">Depuis votre espace, réservez vos jeux favoris pour les récupérer plus tard.</p>
    </div>
  </div>

  <div class="col s12 m4 l4">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-paper-plane-o"></i></h2>
      <h5 class="center">Consulter vos prêts</h5>
      <p class="light">Suivez les jeux que vous empruntez, les dates de retour prévues, et votre historique.</p>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="row center">
      <h5 class="header col s12 light">Saisissez vos identifiants de membre pour vous connecter et accéder aux service de la ludothèque.</h5>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">

    <form action="login" method="post">
      <input type="hidden" name="action" value="connexion">

      <div class="row">
        <div class="input-field col s12 m6">
          <input id="formPseudo" type="text" name="pseudo">
          <label for="formPseudo">Pseudo</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="formMdp" type="password" name="pass">
          <label for="formMdp">Mot de passe</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit">Se connecter</button>
    </form>

  </div>
</div>

<div class="row">
  <div class="col s12 center">
    <img class="responsive-img" src="content/img/MapHomoLudens.png">
  </div>
</div>

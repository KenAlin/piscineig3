<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-user-plus"></i></h2>
      <h5 class="center">Créer un membre</h5>
      <p class="light center">Depuis ce menu, vous pouvez créer un nouveau membre avec son pseudo. Attention : un pseudo est unique, et un pseudo n'appartient qu'à un seul membre. Le mot de passe par défaut sera "HomoLudens", et pourra être changé par l'adhérent ensuite.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12">

    <div class="col s12 m2 l4">
      &nbsp;
    </div>

    <div class="col s12 m8 l4">
      <div class="card yellow lighten-2">
        <form action="creerMembre" method="post">
          <input type="hidden" name="action" value="create">

          <div class="card-content">
            <span class="card-title">Créer un membre</span>
            <div class="input-field">
              <input id="formPseudo" type="text" name="pseudo">
              <label for="formPseudo">Pseudo</label>
            </div>
          </div>
          <div class="card-action">
            <button class="btn green waves-effect waves-light" type="submit">Créer le membre</button>
          </div>

        </form>
      </div>
    </div>

    <div class="col s12 m2 l4">
      &nbsp;
    </div>

  </div>
</div>

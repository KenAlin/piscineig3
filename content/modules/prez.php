<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block center">
      <h2 class="center light-blue-text"><i class="fa fa-flask"></i></h2>
      <h5 class="center">Présentation du logiciel de ludothèque</h5>
      <div class="chip">
        Ana-Maria Oprescu
      </div>
      <div class="chip">
        Erick Taru
      </div>
      <div class="chip">
        Hugo Fazio
      </div>
      <div class="chip">
        Kévin Servigé
      </div>
      <div class="chip">
        Yoann Masson
      </div>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12 m3 l3 center">
    &nbsp;
  </div>

  <div class="input-field col s12 m6 l6 valign-wrapper">
    <!-- AFFICHAGE BARRE CB -->
    <form action="prez" method="post">
      <input type="hidden" name="action" value="ask">
      <i class="material-icons prefix">search</i>
      <input id="question" name="question" type="text" class="validate">
      <label for="question">Une question ?</label>
      <button class="btn waves-effect waves-light" type="submit">Poser !</button>
    </form>
  </div>
</div>

<?php include("content/prez/pages/{$nomPagePrez}.php"); ?>

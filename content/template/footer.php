<footer class="page-footer green darken-1">
  <div class="container">
    <div class="row">
      <div class="col s12 l3 center">
        <img src="content/img/homoludens_80.png">
      </div>
      <div class="col s12 l4">
        <h5 class="white-text">Homo Ludens Associés</h5>
        <p class="grey-text text-lighten-4">Logiciel de gestion en ligne de loduthèque.</p>
      </div>
      <div class="col s12 l5">
        <h5 class="white-text">Liens</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="http://homoludensassocies.fr/v2/">Accueil Homo Ludens Associés</a></li>
          <li><a class="grey-text text-lighten-3" href="https://github.com/KenAlin/piscineig3">Github</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    Un projet piscine IG3 (v0.0.2)
    </div>
  </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="content/framework/js/materialize.min.js"></script>

<script type="text/javascript" src="content/framework/autocomplete/autocomplete.min.js"></script>

<script>
(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $('.dropdown-button').dropdown({
        belowOrigin: true, // Displays dropdown below the button
      }
    );

    $('.tooltipped').tooltip({delay: 50});

    AutoComplete();

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>

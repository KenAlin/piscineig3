<footer class="page-footer green darken-1">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Ludothèque</h5>
        <p class="grey-text text-lighten-4">Pour toutes les bonnes ludothèques qui se respectent.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Liens</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="https://github.com/KenAlin/piscineig3">Github</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    Un projet piscine IG3 (v0.0.1)
    </div>
  </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="content/framework/js/materialize.min.js"></script>

<script>
(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $('.dropdown-button').dropdown({
        belowOrigin: true, // Displays dropdown below the button
      }
    );

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>

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

    AutoComplete({
        select: function(input, item) {
            window.open(item.children[0].getAttribute("href"), '_blank');
        },
        open: function(input, result) {},
        post: function(result, response, custParams) {
            response = JSON.parse(response);
            var empty,
                length = response.length,
                a = domCreate("a"),
                li = domCreate("li"),
                ul = domCreate("ul");

            if (Array.isArray(response)) {
                if (length) {
                    if (custParams.limit < 0) {
                        response.reverse();
                    }

                    for (var i = 0; i < length && (i < Math.abs(custParams.limit) || !custParams.limit); i++) {
                        li.innerHTML = response[i];
                        ul.appendChild(li);
                        li = domCreate("li");
                    }
                } else {
                    //If the response is an object or an array and that the response is empty, so this script is here, for the message no response.
                    empty = true;
                    attr(li, {"class": "locked"});
                    li.innerHTML = custParams.noResult;
                    ul.appendChild(li);
                }
            } else {
                var properties = Object.getOwnPropertyNames(response);

                if (custParams.limit < 0) {
                    properties.reverse();
                }

                for (var propertie in properties) {
                    if (parseInt(propertie) < Math.abs(custParams.limit) || !custParams.limit) {
                        a.innerHTML = response[properties[propertie]];
                        attr(a, {"href": properties[propertie], "target": "_blank"});
                        li.appendChild(a);
                        ul.appendChild(li);
                        a = domCreate("a");
                        li = domCreate("li");
                    }
                }
            }

            if (result.hasChildNodes()) {
                result.childNodes[0].remove();
            }

            result.appendChild(ul);

            return empty;
        }
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>

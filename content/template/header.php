<header>
  <!-- <div id="header_bandeau">
    <a href="."><img id="logo" src="content/img/logo.png"></a>
  </div>

  <div id="header_menu">
    PHP
  </div> -->

  <nav class="teal lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a href="." class="brand-logo"><img id="logo" src="content/img/homoludens.png"></a>
      <ul class="right hide-on-med-and-down">
  			<?php afficheMenu($estConnecte, $estAdmin); ?>
  		</ul>

  		<ul id="nav-mobile" class="side-nav">
  			<?php afficheMenu($estConnecte, $estAdmin); ?>
  		</ul>
  		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-bars"></i></a>
    </div>
  </nav>

</header>

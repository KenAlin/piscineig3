<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Gestion des exemplaires";
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

    // Obtention du jeu
    $infosJeu = infosJeuDepuisId($jeuDemande);

    if ($infosJeu) {
      // On a obtenu le jeu ! Maintenant, on voudrait bien ses exemplaires ...
      $listeExemplaires = exemplairesDunJeu($jeuDemande);
    }
    else {
      $infosJeu = null;
      $listeExemplaires = false;
      $codeMessage = "jeuInvalide";
    }

  }
  else {
    $jeuDemande = -1;
    $infosJeu = null;
    $aDesExtensions = false;
    $codeMessage = "pasDeParametre";
  }


?>

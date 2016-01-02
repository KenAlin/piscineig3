<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Fiche de jeu";
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

    // Obtention du jeu
    $infosJeu = infosJeuDepuisId($jeuDemande);

    if ($infosJeu) {

      // On a obtenu le jeu ! Maintenant, on voudrait bien ses extensions ...
      $extensions = extensionsDunJeu($jeuDemande);

      if ($extensions) $aDesExtensions = true;
      else $aDesExtensions = false;

      // Et le nom de sa catégorie svp
      $nomCatJeu = nomCategorie($infosJeu["cat"]);

    }
    else {
      $infosJeu = null;
      $aDesExtensions = false;
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

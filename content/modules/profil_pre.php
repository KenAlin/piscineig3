<?php
    // *** INFOS SUR LE MODULE ***
    $titrePage = "Profil";
    include_once("content/fonctions/membres.php");

  if ($getParamUn && $estAdmin) {
    $profilDemande = $getParamUn;
  }
  else {
    $profilDemande = $idMembre;
  }

  // Obtention des infos du membre
  $profil = infosMembreDepuisId($profilDemande);

  if (!$profil) {
    $profil = null;
    $codeMessage = "profilInvalide";
  }



?>

<?php
  /* Ce fichier ne sert que pour les autocomplete. */

  if (isset($_GET["uc"])) {
    // Si un use case est demandé, on le stocke dans $useCase (en le sécurisant un peu ...) ; seulement si l'utilisateur est connecté
    $useCase = htmlentities($_GET["uc"]);

    // explode : récupère les paramètres séparés par des tirets
    $parametresGet = explode("-", $useCase);

    // Le nom du module est en premier
    $getModule = $parametresGet[0];

    // Est-ce qu'on a autre chose ?
    if (isset($parametresGet[1])) {
      $getParamUn = $parametresGet[1];
    }
    else { $getParamUn = false; }

    if (isset($parametresGet[2])) {
      $getParamDeux = $parametresGet[2];
    }
    else { $getParamDeux = false; }
  }
  else {
    // Sinon, on utilise des valeurs par défaut
    $getModule = false;
    $getParamUn = false;
    $getParamDeux = false;
  }
?>

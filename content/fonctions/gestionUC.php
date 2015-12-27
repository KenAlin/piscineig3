<?php
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

    // On va ensuite vérifier si on a bien le droit de charger le module ...
    if (!verifieDroits($getModule, $listeDesDroits)) {
      // On n'a pas le droit d'utiliser le module demandé : on bascule sur le module par défaut
      if ($estConnecte) {
        if ($estAdmin) $getModule = "admin";
        else $getModule = "catalogue";
      } // Page par défaut des utilisateurs connectés : le catalogue ou "admin" si admin
      else { $getModule = "login"; } // Page par défaut des utilisateurs non connectés : le formulaire de login
      $codeMessage = "pasLeDroitModule";
    }
  }
  else {
    // Sinon, on utilise des valeurs par défaut
    if ($estConnecte) {
      if ($estAdmin) $getModule = "admin";
      else $getModule = "catalogue";
    } // Page par défaut des utilisateurs connectés : le catalogue ou "admin" si admin 
    else { $getModule = "login"; } // Page par défaut des utilisateurs non connectés : le formulaire de login
    $getParamUn = false;
    $getParamDeux = false;
  }
?>

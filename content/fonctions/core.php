<?php

function verifieDroits($uc, $contexte) {
  // En fonction du useCase demandé, de si l'utilisateur est connecté (ou non) et est admin (ou non), renvoie un booléen indiquant si cet utilisateur a bien accès à ce module.

  // Les droits sont rangés dans un fichier json à part
  $jsonDroits = file_get_contents("content/dictionary/droits.json");
  $listeDroits = json_decode($jsonDroits, true);

  if (in_array($uc, $listeDroits["all"])) { return true; }

  if ($contexte[0]) {
    // Conditions : vérifie les droits
    if (in_array($uc, $listeDroits["users"])) { return true; }
    else {
      if ($contexte[1] == true && in_array($uc, $listeDroits["admin"])) { return true; }
      else if ($contexte[1] == false && in_array($uc, $listeDroits["nonAdmin"])) { return true; }
    }
  }
  else {
    if (in_array($uc, $listeDroits["guests"])) { return true; }
  }

  // On est toujours dans la fonction ? Cela signifie que l'on a pas le droit d'accéder au module (ou celui-ci n'existe pas)
  return false;
}

function redirection($uc) {
  // On redirige l'utilisateur vers un autre module - on considère que les droits sont acquis
  header("Location: {$uc}");
}

function corrigeChemins($ucO, $ucP) {
  if ($ucO) echo "";
  if ($ucP) echo "";
}

?>

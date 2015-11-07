<?php
  // GESTION DES MESSAGES
  // Si besoin est, affiche un message à l'utilisateur sous le menu (information, alerte, avertissement ...)

  if (isset($codeMessage)) {
    // Les messages sont rangés dans un fichier json à part
    $jsonMessages = file_get_contents("content/dictionary/messages.json");
    $listeMessages = json_decode($jsonMessages, true);

    if (in_array($codeMessage, array_keys($listeMessages))) {
      $messageUtilisateur = $listeMessages[$codeMessage][0];
      $messageImportance = $listeMessages[$codeMessage][1];
    }

  }
  else {
    $messageUtilisateur = false;
    $messageImportance = false;
  }

?>

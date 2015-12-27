<?php
  if (isset($_SESSION['estEnLigne'])) {
    $estConnecte = $_SESSION['estEnLigne']; // Soit true, soit false
  }
  else {
    $estConnecte = false;
    $_SESSION['estEnLigne'] = false;
  }

  if (isset($_SESSION['pseudo'])) {
    $pseudoMembre = $_SESSION['pseudo']; // Soit un contenu, soit false
  }
  else {
    $pseudoMembre = false;
    $_SESSION['pseudo'] = false;
  }

  if (isset($_SESSION['idMembre'])) {
    $idMembre = $_SESSION['idMembre']; // Soit un contenu, soit false
  }
  else {
    $idMembre = false;
    $_SESSION['idMembre'] = false;
  }

  if (isset($_SESSION['estAdmin'])) {
    $estAdmin = $_SESSION['estAdmin']; // Soit true, soit false
  }
  else {
    $estAdmin = false;
    $_SESSION['estAdmin'] = false;
  }

  // ENREGISTREMENT DANS UN ARRAY - Contient les informations sur le contexte de l'utilisateur
  if ($estConnecte) {
    $listeDesDroits = array(true, $estAdmin);
  }
  else {
    $listeDesDroits = array(false, false);
  }
?>

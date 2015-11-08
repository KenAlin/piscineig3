<?php

function gestionMessage($codeMessage) {
  // GESTION DES MESSAGES
  // Si besoin est, affiche un message à l'utilisateur sous le menu (information, alerte, avertissement ...)
  $jsonMessages = file_get_contents("content/dictionary/messages.json");
  $listeMessages = json_decode($jsonMessages, true);
  $return = array();

  if (in_array($codeMessage, array_keys($listeMessages))) {
    $return[0] = $listeMessages[$codeMessage][0];
    $return[1] = $listeMessages[$codeMessage][1];
  }
  else {
    $return = array(false, false);
  }
  return $return;
}

function afficheMenu($co, $admin) {
  // Affiche le menu sous la bannière selon le statut de l'utilisateur (connecté ? administrateur ?)
  if ($co) {
    print '<a href="catalogue">Catalogue de jeux</a>';
    if ($admin) {
      print '<a href="admin">Accès admin</a>
      <a href="gestionMembres">Membres</a>
      <a href="gestionReservations">Réservations</a>
      <a href="gestionPrets">Prêts</a>';
    }
    else {
      print '<a href="reserver">Réserver</a>
      <a href="profil">Mon profil</a>';
    }
    print '<a href="deconnexion">Se déconnecter</a>';
  }
  else {
    print '<a href=".">Connectez-vous !</a>';
  }
}

?>

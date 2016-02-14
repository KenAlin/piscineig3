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
    $return = array($codeMessage, "avertissement");
  }
  return $return;
}

function afficheMenu($co, $admin) {
  // Affiche le menu sous la bannière selon le statut de l'utilisateur (connecté ? administrateur ?)
  if ($co) {
    print '<li><a href="catalogue">Catalogue de jeux</a></li>';
    if ($admin) {
      print '<li><a href="admin">Administration</a><li>
      <li><a href="gestionMembres">Membres</a><li>
      <li><a href="gestionReservations">Réservations</a><li>
      <li><a href="gestionPrets">Emprunts</a><li>';
    }
    else {
      print '<li><a href="profil">Mon profil</a><li>';
    }
    print '<li><a href="deconnexion">Se déconnecter</a><li>';
  }
  else {
    print '<li><a href="Connectez-vous !</a><li>';
  }
}

function choixCouleur($ch, $shuffle = false) {
  // Renvoie une couleur propre à la chaine en paramètre
  $couleurs = array("blue", "teal", "green", "purple", "deep-purple", "indigo", "red", "pink", "light-green", "orange", "light-blue", "cyan", "deep-orange", "brown", "blue-grey", "amber");

  if ($shuffle) {
    // Si le paramètre "shuffle" est sur true, on mélange les couleurs ! (Deux fois pour être sûr ...)
    shuffle($couleurs);
    shuffle($couleurs);
  }

  $crypt = $ch;
  $represente = abs(intval($crypt)) % count($couleurs);
  return $couleurs[$represente];
}

function choixCouleurBool($ch) {
  // Renvoie une couleur selon la valeur du booléen
  $couleurs = array("blue", "teal", "green", "purple", "deep-purple", "indigo", "red", "pink", "light-green", "orange", "light-blue", "cyan", "deep-orange", "brown", "blue-grey", "amber");

  if ($ch) return "red";
  else return "blue";
}

?>

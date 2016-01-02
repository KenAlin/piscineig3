<?php

function pretsEnCoursMembre($pseudo) {
  // Renvoie les prêts en cours du membre désigné par son pseudo

  $sql = 'SELECT * FROM ludo_emprunts WHERE pseudo=:pseudo AND dateRetour IS NULL;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function nbPretsEnCoursMembre($pseudo) {
  // Renvoie le nombre de prêts en cours du membre désigné par son pseudo

  return count(pretsEnCoursMembre($pseudo));
}

function infosMembreDepuisPseudo($pseudo) {
  // Renvoie les infos du membre désigné par son pseudo

  $sql = 'SELECT * FROM ludo_utilisateurs WHERE pseudo=:pseudo;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) return $result[0];
  else return false;
}

function infosMembreDepuisId($id) {
  // Renvoie les infos du membre désigné par son identifiant

  $sql = 'SELECT * FROM ludo_utilisateurs WHERE id=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) return $result[0];
  else return false;
}

function infosTousMembres() {
  // Renvoie toutes les infos de tous les membres

  $sql = 'SELECT * FROM ludo_utilisateurs ;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}



?>

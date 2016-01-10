<?php

function nbJeuxHorsExt($categorie) {
  // Renvoie le nombre de jeux de jeux, extensions non incluses, d'une catégorie (ou de toutes les catégories si $categorie == 0)

  if ($categorie != 0) {
    $sql = 'SELECT count(*) FROM ludo_jeux WHERE cat=:cat AND parent IS NULL;';
    $requete = $GLOBALS['bd']->prepare($sql);
    $requete->execute(array(':cat' => $categorie));
    $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  }
  else {
    $sql = 'SELECT count(*) FROM ludo_jeux WHERE parent IS NULL;';
    $requete = $GLOBALS['bd']->prepare($sql);
    $requete->execute();
    $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  }
  $compteJeux = $result[0]["count(*)"];

  return $compteJeux;
}

function listeCategories() {
  // Renvoie la liste de TOUTES les catégories sous forme d'array
  $sql = 'SELECT * FROM ludo_categorie;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function nomCategorie($idCat) {
  // Renvoie le nom d'une catégorie désignée par son identifiant
  $sql = 'SELECT nom FROM ludo_categorie WHERE id_cat=:cat;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':cat', $idCat, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0]["nom"];
    return $result;
  }
  else return false;
}

function infosJeuDepuisId($id) {
  // Renvoie la liste de TOUTES les infos d'un jeu sous forme d'array ... renvoie false si jeu non trouvé
  $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0];
    return $result;
  }
  else return false;
}

function infosJeuDepuisNom($nom) {
  // Renvoie la liste de TOUTES les infos d'un jeu sous forme d'array ... renvoie false si jeu non trouvé
  $sql = 'SELECT * FROM ludo_jeux WHERE nom=:nom;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':nom', $nom, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0];
    return $result;
  }
  else return false;
}

function extensionsDunJeu($id) {
  // Renvoie la liste de TOUTES les extensions d'un jeu sous forme d'array ... renvoie false si aucune extension n'est trouvée
  $sql = 'SELECT * FROM ludo_jeux WHERE parent=:parent;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':parent', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    return $result;
  }
  else return false;
}

function exemplairesDunJeu($id) {
  // Renvoie la liste de TOUS les exemplaires d'un jeu sous forme d'array ... renvoie false si aucun exemplaire n'est trouvée
  $sql = 'SELECT * FROM ludo_exemplaires WHERE idJeu=:jeu;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':jeu', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    return $result;
  }
  else return false;
}

function infosExemplaireDepuisCodeBarres($cb) {
  // Renvoie la liste de TOUTES les infos d'un exemplaire d'un jeu depuis son code-barre sous forme d'array ... renvoie false si exemplaire non trouvé
  $sql = 'SELECT * FROM ludo_exemplaires WHERE code_barre=:cb;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':cb', $cb, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0];
    return $result;
  }
  else return false;
}

function infosExemplaireDepuisId($id) {
  // Renvoie la liste de TOUTES les infos d'un exemplaire d'un jeu depuis son code-barre sous forme d'array ... renvoie false si exemplaire non trouvé
  $sql = 'SELECT * FROM ludo_exemplaires WHERE idEx=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0];
    return $result;
  }
  else return false;
}

function infosPretDepuisId($id) {
  // Renvoie la liste de TOUTES les infos d'un pret d'un jeu depuis son id sous forme d'array ... renvoie false si prêt non trouvé
  $sql = 'SELECT * FROM ludo_emprunts WHERE idEmprunt=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    $result = $result[0];
    return $result;
  }
  else return false;
}

function nbResaEnCoursJeu($id) {
  // Renvoie le nombre de réservations EN COURS d'un jeu, depuis son id
  $sql = 'SELECT count(*) FROM ludo_reservation WHERE dateFin >= :now AND idJeu=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':now', time(), PDO::PARAM_INT);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  $result = $result[0]["count(*)"];

  return $result;
}

function nbPretsEnCoursJeu($id) {
  // Renvoie le nombre de prêts EN COURS d'un jeu, depuis son id
  $sql = 'SELECT count(*) FROM ludo_emprunts AS emp, ludo_exemplaires AS ex, ludo_jeux AS j WHERE emp.dateRetour IS NULL AND emp.idExemplaire = ex.idEx AND ex.idJeu = j.id AND j.id=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  $result = $result[0]["count(*)"];

  return $result;
}

function nbPretsEnCoursNonFinisJeu($id, $nbJours) {
  // Renvoie le nombre de prêts EN COURS d'un jeu, depuis son id, qui ne seront pas finis dans $nbJours jours
  $sql = 'SELECT count(*) FROM ludo_emprunts AS emp, ludo_exemplaires AS ex, ludo_jeux AS j WHERE emp.dateRetour IS NULL AND emp.idExemplaire = ex.idEx AND ex.idJeu = j.id AND j.id=:id AND emp.dateFin > :temps;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->bindValue(':temps', time() + $nbJours*3600*24, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  $result = $result[0]["count(*)"];

  return $result;
}

function nbExemplairesJeu($id) {
  // Renvoie le nombre d'exemplaires d'un jeu, depuis son id
  $sql = 'SELECT count(*) FROM ludo_exemplaires WHERE idJeu=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  $result = $result[0]["count(*)"];

  return $result;
}

function nbReservationsJeuNonFinies($id, $nbJours) {
  // Renvoie le nombre de réservations concernant un jeu ($id) qui seront toujours en cours dans $nbJours jours
  $sql = 'SELECT count(*) FROM ludo_reservation WHERE idJeu=:id AND dateEmprunt IS NULL AND dateFin > :temps;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->bindValue(':temps', time() + $nbJours*3600*24, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);
  $result = $result[0]["count(*)"];

  return $result;
}

function empruntNonBloque($idJeu, $pseudo) {
  // Renvoie TRUE si l'emprunt n'est pas bloqué par les réservations, ou si le membre dispose bien d'une réservation pour ce jeu

  // Membre dispose de la réservation du jeu en cours ?
  $sql = 'SELECT * FROM ludo_reservation WHERE pseudo=:pseudo AND dateFin > :now AND dateEmprunt IS NULL;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
  $requete->bindValue(':now', time(), PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) {
    // C'est bon, il peut emprunter
    return true;
  }
  else {
    // Emprunt possible : nbExemplairesDispo > nbExemplairesReserves
    if (nbExemplairesJeu($idJeu) > nbReservationsJeuNonFinies($idJeu, 0)) return true;
    else return false;
  }
  return $result;
}


?>

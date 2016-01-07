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
  $sql = 'SELECT * FROM ludo_exemplaires WHERE id=:id;';
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


?>
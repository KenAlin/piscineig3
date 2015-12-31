<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Catalogue des jeux";

  // On va obtenir la liste des catégories
  $sql = 'SELECT * FROM ludo_categorie;';
  $requete = $bd->prepare($sql);
  $requete->execute();
  $listeCategories = $requete->fetchAll(PDO::FETCH_ASSOC);

  if ($getParamUn) {
    $catDemandee = intval($getParamUn);
  }
  else {
    $catDemandee = 0;
  }

  if ($getParamDeux) {
    $pageDemande = intval($getParamDeux);
  }
  else {
    $pageDemande = 1;
  }
  $limite = 33;

  // Obtention nombre total de jeux (pour la pagination)
  if ($catDemandee != 0) {
    $sql = 'SELECT count(*) FROM ludo_jeux WHERE cat=:cat AND parent IS NULL;';
    $requete = $bd->prepare($sql);
    $requete->execute(array(':cat' => $catDemandee));
    $compteJeux = $requete->fetchAll(PDO::FETCH_ASSOC);
    $compteJeux = $compteJeux[0]["count(*)"];
  }
  else {
    $sql = 'SELECT count(*) FROM ludo_jeux WHERE parent IS NULL;';
    $requete = $bd->prepare($sql);
    $requete->execute();
    $compteJeux = $requete->fetchAll(PDO::FETCH_ASSOC);
    $compteJeux = $compteJeux[0]["count(*)"];
  }


  $nbPagesCatalogue = intval($compteJeux / $limite)+1;

  // Est-ce que la page demandée existe ?
  if ($pageDemande > $nbPagesCatalogue || $pageDemande < 1) {
    $pageDemande = 1;
  }

  $offsetJeux = ($pageDemande - 1)*$limite;

  // Obtention de la liste de jeux (limite les jeux par page)
  if ($catDemandee != 0) {
    $sql = 'SELECT * FROM ludo_jeux WHERE cat=:cat AND parent IS NULL ORDER BY nom LIMIT :off, :lim;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':lim', (int) $limite, PDO::PARAM_INT);
    $requete->bindValue(':off', (int) $offsetJeux, PDO::PARAM_INT);
    $requete->bindValue(':cat', $catDemandee, PDO::PARAM_INT);
    $requete->execute();
    $listeJeux = $requete->fetchAll(PDO::FETCH_ASSOC);
  }
  else {
    $sql = 'SELECT * FROM ludo_jeux WHERE parent IS NULL ORDER BY nom LIMIT :off, :lim;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':lim', (int) $limite, PDO::PARAM_INT);
    $requete->bindValue(':off', (int) $offsetJeux, PDO::PARAM_INT);
    $requete->execute();
    $listeJeux = $requete->fetchAll(PDO::FETCH_ASSOC);
  }


?>

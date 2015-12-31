<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Catalogue des jeux";

  if ($getParamDeux) {
    $pageDemande = intval($getParamDeux);
  }
  else {
    $pageDemande = 1;
  }
  $limite = 33;

  // Obtention nombre total de jeux (pour la pagination)
  $sql = 'SELECT count(*) FROM ludo_jeux WHERE parent IS NULL;';
  $requete = $bd->prepare($sql);
  $requete->execute(array(':id' => 0));
  $compteJeux = $requete->fetchAll(PDO::FETCH_ASSOC);
  $compteJeux = $compteJeux[0]["count(*)"];

  $nbPagesCatalogue = intval($compteJeux / $limite)+1;

  // Est-ce que la page demandée existe ?
  if ($pageDemande > $nbPagesCatalogue || $pageDemande < 1) {
    $pageDemande = 1;
  }

  $offsetJeux = ($pageDemande - 1)*33+1;

  // Obtention de la liste de jeux (limite les jeux par page)
  $sql = 'SELECT * FROM ludo_jeux WHERE id >= :id AND parent IS NULL ORDER BY nom LIMIT :lim;';
  $requete = $bd->prepare($sql);
  $requete->bindValue(':lim', (int) $limite, PDO::PARAM_INT);
  $requete->bindValue(':id', $offsetJeux, PDO::PARAM_INT);
  $requete->execute();
  $listeJeux = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

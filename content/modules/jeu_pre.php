<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Fiche de jeu";

  if ($useCasePage) {
    $jeuDemande = intval($useCasePage);
  }
  else {
    $jeuDemande = 1;
  }

  // Obtention nombre total de jeux (pour la pagination)
  $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
  $requete = $bd->prepare($sql);
  $requete->bindValue(':id', $jeuDemande, PDO::PARAM_INT);
  $requete->execute();
  $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);
  $infosJeu = $infosJeu[0];
?>

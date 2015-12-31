<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Fiche de jeu";

  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

    // Obtention nombre total de jeux (pour la pagination)
    $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $jeuDemande, PDO::PARAM_INT);
    $requete->execute();
    $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($infosJeu[0])) {
      $infosJeu = $infosJeu[0];

      // On a obtenu le jeu ! Maintenant, on voudrait bien ses extensions ...
      $sql = 'SELECT * FROM ludo_jeux WHERE parent=:parent;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':parent', $jeuDemande, PDO::PARAM_INT);
      $requete->execute();
      $extensions = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (isset($extensions[0])) {
        $aDesExtensions = true;
      }
      else {
        $aDesExtensions = false;
      }

    }
    else {
      $infosJeu = null;
      $aDesExtensions = false;
      $codeMessage = "jeuInvalide";
    }

  }
  else {
    $jeuDemande = -1;
    $infosJeu = null;
    $aDesExtensions = false;
    $codeMessage = "pasDeParametre";
  }


?>

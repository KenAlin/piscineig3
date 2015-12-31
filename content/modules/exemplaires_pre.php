<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Gestion des exemplaires";

  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

    // Obtention du jeu
    $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $jeuDemande, PDO::PARAM_INT);
    $requete->execute();
    $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($infosJeu[0])) {
      $infosJeu = $infosJeu[0];

      // On a obtenu le jeu ! Maintenant, on voudrait bien ses exemplaires ...
      $sql = 'SELECT * FROM ludo_exemplaires WHERE idJeu=:jeu;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':jeu', $jeuDemande, PDO::PARAM_INT);
      $requete->execute();
      $listeExemplaires = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (count($listeExemplaires) == 0) {
        $listeExemplaires = null;
      }
    }
    else {
      $infosJeu = null;
      $listeExemplaires = false;
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

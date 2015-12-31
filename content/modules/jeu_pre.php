<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Fiche de jeu";

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

      // Et le nom de sa catégorie svp
      $sql = 'SELECT nom FROM ludo_categorie WHERE id_cat=:cat;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':cat', $infosJeu["cat"], PDO::PARAM_INT);
      $requete->execute();
      $catJeu = $requete->fetchAll(PDO::FETCH_ASSOC);
      $nomCatJeu = $catJeu[0]["nom"];

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

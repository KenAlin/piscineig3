<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Supprimer un jeu";

  // Le paramètre est l'id du jeu à supprimer
  if ($getParamUn) {
    $idJeuSuppr = intval($getParamUn);
  }
  else {
    $idJeuSuppr = null;
  }

  if ($idJeuSuppr) {
    // On a obtenu le jeu parent ! Maintenant, on voudrait bien son nom (pour être sûr) ...
    $sql = 'SELECT nom FROM ludo_jeux WHERE id=:param;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':param', $idJeuSuppr, PDO::PARAM_INT);
    $requete->execute();
    $nomJeu = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($nomJeu[0])) {
      $nomJeu = $nomJeu[0]["nom"];
      if ($actionPost == "suppr") {
        // On arrive depuis le formulaire : on va sécuriser quelques données ...
        if (isset($_POST["nom"])) {
          $postNom = trim(htmlentities($_POST["nom"]));
        } else { $postNom = false; }

        if ($postNom) {
          // Le formulaire ne semble pas incomplet
          if ($postNom === $nomJeu) {
            // On va vérifier que le jeu n'a plus d'extensions filles
            $sql = 'SELECT * FROM ludo_jeux WHERE parent=:param;';
            $requete = $bd->prepare($sql);
            $requete->bindValue(':param', $idJeuSuppr, PDO::PARAM_INT);
            $requete->execute();
            $result = $requete->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) == 0) {
              // Le jeu n'a plus d'extension ! On va vérifier les exemplaires (il en faut 0 également)
              $sql = 'SELECT * FROM ludo_exemplaires WHERE idJeu=:param;';
              $requete = $bd->prepare($sql);
              $requete->bindValue(':param', $idJeuSuppr, PDO::PARAM_INT);
              $requete->execute();
              $result = $requete->fetchAll(PDO::FETCH_ASSOC);

              if (count($result) == 0) {
                // Le jeu n'a plus d'exexmplaires ! On peut supprimer !!
                $sql = 'DELETE FROM ludo_jeux WHERE id=:param;';
                $requete = $bd->prepare($sql);
                $requete->bindValue(':param', $idJeuSuppr, PDO::PARAM_INT);
                $requete->execute();
                $codeMessage = "supprJeuOK";
              }
              else {
                $codeMessage = "supprJeuEncoreExemplaires";
              }
            }
            else {
              $codeMessage = "supprJeuEncoreExtensions";
            }
          }
          else {
            $codeMessage = "supprJeuSecuriteInvalide";
          }
        }
        else {
          $codeMessage = "formIncomplet";
        }
      }
    }
    else {
      $nomJeu = false;
      $idJeuSuppr = false;
      $codeMessage = "supprJeuParamInvalide";
    }
  }
  else {
    $codeMessage = "supprJeuPasDeParam";
    $idJeuSuppr = false;
    $nomJeu = false;
  }



?>

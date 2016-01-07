<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Supprimer un exemplaire";
  include_once("content/fonctions/jeux.php");

  // Le paramètre est l'id du jeu à supprimer
  if ($getParamUn) {
    $idExemplaireSuppr = intval($getParamUn);

    // Obtention du jeu
    $infosJeu = infosJeuDepuisId($idExemplaireSuppr);

    if ($infosJeu) {
      // On a obtenu le jeu ! Maintenant, on voudrait bien ses exemplaires ...
      $listeExemplaires = exemplairesDunJeu($idExemplaireSuppr);
    }
    else {
      $infosJeu = null;
      $listeExemplaires = false;
      $codeMessage = "exemplaireInvalide";
    }


    if ($infosJeu) {
      $nomJeu = $infosJeu["nom"];
      if ($actionPost == "suppr") {
        // On arrive depuis le formulaire : on va sécuriser quelques données ...
        if (isset($_POST["nom"])) {
          $postNom = trim(htmlentities($_POST["nom"]));
        } else { $postNom = false; }

        if ($postNom) {
          // Le formulaire ne semble pas incomplet
          if ($postNom === $nomJeu) {
            // On va vérifier que le jeu a des extensions
            if (extensionsDunJeu($idExemplaireSuppr)) {
              // Le jeu a d'extension ! On va vérifier les exemplaires
              if (!exemplairesDunJeu($idExemplaireSuppr)) {
                // Le jeu a d'exemplaires ! On peut supprimer !!
                $sql = 'DELETE FROM ludo_exemplaires WHERE id=:param;';
                $requete = $bd->prepare($sql);
                $requete->bindValue(':param', $idExemplaireSuppr, PDO::PARAM_INT);
                $requete->execute();
                $codeMessage = "supprExemplaireOK";
              }
              else {
                $codeMessage = "supprEmplairePasdeExemplaires";
              }
            }
            else {
              $codeMessage = "supprExemplairePasdeExtensions";
            }
          }
          else {
            $codeMessage = "supprExemplaireSecuriteInvalide";
          }
        }
        else {
          $codeMessage = "formIncomplet";
        }
      }
    }
    else {
      $nomJeu = false;
      $idExemplaireSuppr = false;
      $codeMessage = "supprExemplaireParamInvalide";
    }
  }
  else {
    $codeMessage = "supprExemplairePasDeParam";
  $idExemplaireSuppr = false;
    $nomJeu = false;
  }



?>

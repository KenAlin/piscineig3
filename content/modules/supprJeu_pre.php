<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Supprimer un jeu";
  include_once("content/fonctions/jeux.php");

  // Le paramètre est l'id du jeu à supprimer
  if ($getParamUn) {
    $idJeuSuppr = intval($getParamUn);
  }
  else {
    $idJeuSuppr = null;
  }

  if ($idJeuSuppr) {
    // On a obtenu le jeu parent ! Maintenant, on voudrait bien son nom (pour être sûr) ...
    $infosJeu = infosJeuDepuisId($idJeuSuppr);

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
            // On va vérifier que le jeu n'a plus d'extensions filles
            if (!extensionsDunJeu($idJeuSuppr)) {
              // Le jeu n'a plus d'extension ! On va vérifier les exemplaires (il en faut 0 également)
              if (!exemplairesDunJeu($idJeuSuppr)) {
                // Le jeu n'a plus d'exemplaires ! On peut supprimer !!
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

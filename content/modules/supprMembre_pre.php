<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Supprimer un membre";

  // Le paramètre est l'id du membre à supprimer
  if ($getParamUn) {
    $idUserSuppr = intval($getParamUn);
  }
  else {
    $idUserSuppr = null;
  }

  if ($idUserSuppr) {
    // On a obtenu le membre ! Maintenant, on voudrait bien son pseudo (pour être sûr) ...
    $sql = 'SELECT * FROM ludo_utilisateurs WHERE id=:param;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':param', $idUserSuppr, PDO::PARAM_INT);
    $requete->execute();
    $infosMembre = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($infosMembre[0])) {
      $pseudoMembre = $infosMembre[0]["pseudo"];
      if ($actionPost == "suppr") {
        // On arrive depuis le formulaire : on va sécuriser quelques données ...
        if (isset($_POST["pseudo"])) {
          $postPseudo = trim(htmlentities($_POST["pseudo"]));
        } else { $postPseudo = false; }

        if ($postPseudo) {
          // Le formulaire ne semble pas incomplet
          if ($postPseudo === $pseudoMembre && !$infosMembre[0]["estAdmin"]) {
            // TODO : FAIRE LES TESTS SI IL RESTE PRETS EN COURS OU RESERVATIONS
            $sql = 'DELETE FROM ludo_utilisateurs WHERE id=:param;';
            $requete = $bd->prepare($sql);
            $requete->bindValue(':param', $idUserSuppr, PDO::PARAM_INT);
            $requete->execute();
            $codeMessage = "supprUserOK";
          }
          else {
            $codeMessage = "supprUserSecuriteInvalide";
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
      $codeMessage = "supprUserParamInvalide";
    }
  }
  else {
    $codeMessage = "supprUserPasDeParam";
    $idJeuSuppr = false;
    $nomJeu = false;
  }



?>

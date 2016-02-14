<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Modifier son mot de passe";
  include_once("content/fonctions/membres.php");

  if ($getParamUn && $estAdmin) {
    $idMembreMdpAModifier = $getParamUn;
    $modifieSonPassword = false;
  }
  else {
    $idMembreMdpAModifier = $idMembre;
    $modifieSonPassword = true;
  }

  // Obtention des infos du membre
  $profil = infosMembreDepuisId($idMembreMdpAModifier);

  if (!$profil) {
    $profil = null;
    $idMembreMdpAModifier = $idMembre;
    $profil = infosMembreDepuisId($idMembreMdpAModifier);
    $modifieSonPassword = true;
  }

  if ($actionPost == "edit") {
    // On arrive depuis le formulaire : on va sécuriser quelques données ...
    if (isset($_POST["ancienMdp"])) {
      $postAncienMdp = trim(htmlentities($_POST["ancienMdp"]));
    } else { $postAncienMdp = false; }
    if (isset($_POST["nouveauMdp"])) {
      $postNouveauMdp = trim(htmlentities($_POST["nouveauMdp"]));
    } else { $postNouveauMdp = false; }
    if (isset($_POST["confirmMdp"])) {
      $postConfirmMdp = trim(htmlentities($_POST["confirmMdp"]));
    } else { $postConfirmMdp = false; }

    if (($postAncienMdp && $postNouveauMdp && $postConfirmMdp) || ($estAdmin && $postNouveauMdp && $postConfirmMdp)) {
      // On va chercher le mot de passe actuel (son hash ...)
      $infosMembre = infosMembreDepuisId($idMembreMdpAModifier);
      if (password_verify($postAncienMdp, $infosMembre["password"]) || ($estAdmin && $idMembreMdpAModifier != $idMembre)) {
        if ($postNouveauMdp === $postConfirmMdp) {
          // On modifie !
          $postNouveauMdp = password_hash($postNouveauMdp, PASSWORD_DEFAULT);
          $sql = 'UPDATE ludo_utilisateurs SET password=:pwd WHERE id=:id;';
          $requete = $bd->prepare($sql);
          $requete->execute(array(':pwd' => $postNouveauMdp,
            ':id' => $idMembreMdpAModifier));
          $codeMessage = "modifMdpOK";
        }
        else {
          // Erreur ! Nouveau mot de passe mal confirmé
          $codeMessage = "modifMdpMauvaiseConfirm";
        }
      }
      else {
        // Erreur ! Mot de passe actuel ne correspond pas à celui saisi
        $codeMessage = "modifMdpAncienMdpInvalide";
      }
    }
    else {
      // Erreur ! Formulaire incomplet
      $codeMessage = "formIncomplet";
    }

  }

?>

<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Supprimer un exemplaire";
  include_once("content/fonctions/jeux.php");
  include_once("content/fonctions/prets.php");

  // Le paramètre est l'id de l'exemplaire à supprimer
  if ($getParamUn) {
    $idExemplaireSuppr = intval($getParamUn);

    // Obtention de l'exemplaire
    $infosExmpl = infosExemplaireDepuisId($idExemplaireSuppr);

    if ($infosExmpl) {
      $infosJeu = infosJeuDepuisId($infosExmpl["idJeu"]);
      if ($actionPost == "suppr") {

        // On arrive depuis le formulaire : on va sécuriser quelques données ...
        if (isset($_POST["confirm"])) {
          $postConfirm = intval($_POST["confirm"]);
        } else { $postConfirm = false; }

        if ($postConfirm) {
          // Le formulaire ne semble pas incomplet
          if (!pretsEnCoursExemplaire($idExemplaireSuppr)) {
            // Pas de prêts en cours : on supprime !
            $sql = 'DELETE FROM ludo_exemplaires WHERE idEx=:param;';
            $requete = $bd->prepare($sql);
            $requete->bindValue(':param', $idExemplaireSuppr, PDO::PARAM_INT);
            $requete->execute();
            $codeMessage = "supprExemplaireOK";
            redirection("exemplaires-{$infosJeu['id']}");
          } else {
            $codeMessage = "supprExemplairePretsToujoursEnCours";
          }
        }
        else {
          $codeMessage = "formIncomplet";
        }
      }
    }
    else {
      $idExemplaireSuppr = false;
      $codeMessage = "supprExemplaireParamInvalide";
    }
  }
  else {
    $codeMessage = "pasDeParametre";
    $idExemplaireSuppr = false;
    $nomJeu = false;
  }



?>

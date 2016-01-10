<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Modifier la fiche d'un exemplaire";
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $exmplDemande = intval($getParamUn);

    // Traitement si on a modifié la fiche
    if ($actionPost == "edit") {
      // On arrive depuis le formulaire : on va sécuriser quelques données ...
      if (isset($_POST["code_barre"])) {
        $postCB = trim(htmlentities($_POST["code_barre"]));
      } else { $postCB = NULL; }
      if (isset($_POST["commentaire"])) {
        $postCommnt = trim(htmlentities($_POST["commentaire"]));
      } else { $postCommnt = NULL; }

      // On va chercher en BD les infos sur un éventuel exemplaire qui porterait déjà ce code barre
      $bypassVerifCB = false;
      if ($postCB) {
        $sql = 'SELECT * FROM ludo_exemplaires WHERE code_barre = :cb AND code_barre IS NOT NULL AND idEx != :id;';
        $requete = $bd->prepare($sql);
        $requete->execute(array(':cb' => $postCB, ':id' => $exmplDemande));
        $infosEx = $requete->fetchAll(PDO::FETCH_ASSOC);
      }
      else {
        $bypassVerifCB = true;
      }

      if ($bypassVerifCB || count($infosEx) == 0) {
        // Ok, pas d'exemplaire qui porte ce code barre en BD ! On modifie ...
        $sql = 'UPDATE ludo_exemplaires SET code_barre=:cb, commentaire=:commnt WHERE idEx=:id;';
        $requete = $bd->prepare($sql);
        $requete->execute(array(':cb' => $postCB,
          ':commnt' => $postCommnt,
          ':id' => $exmplDemande));
        $codeMessage = "formEditExemplaireOK";
      }
      else {
        // Eeeh ... zut. Exemplaire déjà existant.
        $codeMessage = "formEditExCBDejaPris";

      }


    }
    // Fin de traitement de la fiche

    // Obtention du jeu
    $infosExmpl = infosExemplaireDepuisId($exmplDemande);

    if (!$infosExmpl) {
      $infosExmpl = null;
      $codeMessage = "exemplaireInvalide";
    }
  }
  else {
    $exmplDemande = null;
    $infosExmpl = null;
    $codeMessage = "pasDeParametre";
  }

?>

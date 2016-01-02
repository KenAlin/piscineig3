<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Modifier le profil d'un membre";
  include_once("content/fonctions/membres.php");

  if ($getParamUn) {
    $profilDemande = intval($getParamUn);

    // Traitement si on a modifié la fiche
    if ($actionPost == "edit") {
      // On arrive depuis le formulaire : on va sécuriser quelques données ...
      if (isset($_POST["admin"])) {
        $postAdmin = intval($_POST["admin"]);
      } else { $postAdmin = false; }
      if ($estAdmin && $idMembre == $profilDemande) $postAdmin = true;
      if (isset($_POST["nom"])) {
        $postNom = trim(htmlentities($_POST["nom"]));
      } else { $postNom = false; }
      if (isset($_POST["prenom"])) {
        $postPrenom = trim(htmlentities($_POST["prenom"]));
      } else { $postPrenom = false; }
      if (isset($_POST["mail"])) {
        $postMail = trim(htmlentities($_POST["mail"]));
      } else { $postMail = false; }
      if (isset($_POST["telephone"])) {
        $postTelephone = trim(htmlentities($_POST["telephone"]));
      } else { $postTelephone = false; }

      // Go go ! On va modifier les infos (on écrase, on écrit par dessus)
      $sql = 'UPDATE ludo_utilisateurs SET estAdmin=:admin, nom=:nom, prenom=:prenom, mail=:mail, telephone=:telephone WHERE id=:iduser;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':admin', (int) $postAdmin, PDO::PARAM_INT);
      $requete->bindValue(':nom', $postNom, PDO::PARAM_INT);
      $requete->bindValue(':prenom', $postPrenom, PDO::PARAM_INT);
      $requete->bindValue(':mail', $postMail, PDO::PARAM_INT);
      $requete->bindValue(':telephone', $postTelephone, PDO::PARAM_INT);
      $requete->bindValue(':iduser', $profilDemande, PDO::PARAM_INT);
      $requete->execute();

      // Et on vérifie si il faut toucher à l'adhésion
      if (isset($_POST["renouvellement"])) {
        $postAdh = intval($_POST["renouvellement"]);
      } else { $postAdh = 0; }

      if ($postAdh > 0) {
        if ($postAdh == 5) $nbJoursAdh = 0; // On demande la suppression immédiate de son adhésion
        else if ($postAdh == 4) $nbJoursAdh = 365;
        else if ($postAdh == 3) $nbJoursAdh = 91;
        else if ($postAdh == 2) $nbJoursAdh = 31;
        else if ($postAdh == 1) $nbJoursAdh = 7;

        $finAbo = time() + 60*60*24*$nbJoursAdh;
        if ($postAdh != 5) $finAbo = strtotime("tomorrow", $finAbo) - 1; // Obtient 23:59:59 du dernier jour d'adhésion
        $sql = 'UPDATE ludo_utilisateurs SET fin_abo=:fin WHERE id=:iduser;';
        $requete = $bd->prepare($sql);
        $requete->bindValue(':fin', $finAbo, PDO::PARAM_INT);
        $requete->bindValue(':iduser', $profilDemande, PDO::PARAM_INT);
        $requete->execute();
      }


      $codeMessage = "formEditUserOK";
    }
    // Fin de traitement de la fiche

    // Obtention du membre
    $infosUser = infosMembreDepuisId($profilDemande);

    if (!$infosUser) {
      $infosUser = null;
      $codeMessage = "profilInvalide";
    }

  }
  else {
    $profilDemande = null;
    $infosUser = null;
    $codeMessage = "pasDeParametre";
  }

?>

<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Modifier le profil d'un membre";

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
      $codeMessage = "formEditUserOK";
    }
    // Fin de traitement de la fiche

    // Obtention du jeu
    $sql = 'SELECT * FROM ludo_utilisateurs WHERE id=:id;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $profilDemande, PDO::PARAM_INT);
    $requete->execute();
    $infosUser = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($infosUser[0])) {
      $infosUser = $infosUser[0];
    }
    else {
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

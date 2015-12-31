<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Créer une fiche d'un nouveau jeu";

  // Si il y a un paramètre : le nouveau jeu sera une extension, et ce paramètre est l'id du parent
  if ($getParamUn) {
    $parentNouvJeu = intval($getParamUn);
  }
  else {
    $parentNouvJeu = null;
  }

  if ($parentNouvJeu) {
    // On a obtenu le jeu parent ! Maintenant, on voudrait bien son nom (pour être sûr) ...
    $sql = 'SELECT nom FROM ludo_jeux WHERE id=:param;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':param', $parentNouvJeu, PDO::PARAM_INT);
    $requete->execute();
    $nomParent = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($nomParent[0])) {
      $nomParent = $nomParent[0]["nom"];
    }
    else {
      $nomParent = false;
      $parentNouvJeu = null;
    }
  }

  if ($actionPost == "create") {
    // On arrive depuis le formulaire : on va sécuriser quelques données ...
    if (isset($_POST["nom"])) {
      $postNom = trim(htmlentities($_POST["nom"]));
    } else { $postNom = false; }
    if (isset($_POST["annee"])) {
      $postAnnee = trim(htmlentities($_POST["annee"]));
    } else { $postAnnee = false; }
    if (isset($_POST["editeur"])) {
      $postEditeur = trim(htmlentities($_POST["editeur"]));
    } else { $postEditeur = false; }
    if (isset($_POST["age"])) {
      $postAge = trim(htmlentities($_POST["age"]));
    } else { $postAge = false; }
    if (isset($_POST["nbjoueurs"])) {
      $postNbJ = trim(htmlentities($_POST["nbjoueurs"]));
    } else { $postNbJ = false; }
    if (isset($_POST["desc"])) {
      $postDesc = trim(htmlentities($_POST["desc"]));
    } else { $postDesc = false; }

    if ($postNom) {
      // Le formulaire ne semble pas incomplet : on va chercher en BD les infos sur un éventuel jeu qui porterait déjà ce nom
      $sql = 'SELECT * FROM ludo_jeux WHERE nom = :nom;';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':nom' => $postNom));
      $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (count($infosJeu) == 0) {
        // Ok, pas de jeu qui porte ce nom en BD !
        // On va l'ajouter, ok ?
        $sql = 'INSERT INTO  ludo_jeux (id ,nom ,description ,cat ,année ,éditeur ,age ,nb_joueurs,parent)  VALUES (NULL ,  :nom,  :descr,  :cat,  :annee,  :editeur,  :age,  :nbj,  :parent);';
        $requete = $bd->prepare($sql);
        $requete->execute(array(':nom' => $postNom, ':descr' => $postDesc,':cat' => 0,':annee' => $postAnnee,':editeur' => $postEditeur,':age' => $postAge,':nbj' => $postNbJ,':parent' => $parentNouvJeu,));
        $codeMessage = "formCreerJeuOK";
      }
      else {
        // Eeeh ... zut. Jeu déjà existant.
        $codeMessage = "formCreerJeuNomDejaPris";

      }
    }
    else {
      $codeMessage = "formIncomplet";
    }
  }

?>

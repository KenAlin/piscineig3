<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Ajout d'un exemplaire";
  include_once("content/fonctions/jeux.php");

  // Il faut un paramètre : l'id du jeu auquel on va rajouter un exemplaire
  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

      // Obtention du jeu
      $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':id', $jeuDemande, PDO::PARAM_INT);
      $requete->execute();
      $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (isset($infosJeu[0])) {
        $infosJeu = $infosJeu[0];

        // On a obtenu le jeu ! Maintenant, est-ce qu'il y a quelque chose à ajouter ? ...
        if ($actionPost == "create") {
          // On arrive depuis le formulaire : on va sécuriser quelques données ...
          if (isset($_POST["code_barre"])) {
            $postCodeBarre = trim(htmlentities($_POST["code_barre"]));
          } else { $postCodeBarre = null; }
          if (isset($_POST["commentaire"])) {
            $postComment = trim(htmlentities($_POST["commentaire"]));
          } else { $postComment = false; }

          // On va chercher en BD les infos sur un éventuel exemplaire qui porterait déjà ce code barre
          $bypassVerifCB = false;
          if ($postCodeBarre) {
            $sql = 'SELECT * FROM ludo_exemplaires WHERE code_barre = :cb AND code_barre IS NOT NULL;';
            $requete = $bd->prepare($sql);
            $requete->execute(array(':cb' => $postCodeBarre));
            $infosEx = $requete->fetchAll(PDO::FETCH_ASSOC);
          }
          else {
            $bypassVerifCB = true;
          }

          if ($bypassVerifCB || count($infosEx) == 0) {
            // Ok, pas d'exemplaire qui porte ce code barre en BD ! On ajoute ...
            $sql = 'INSERT INTO  ludo_exemplaires (idJeu, code_barre, commentaire)  VALUES (:jeu, :cb, :comment);';
            $requete = $bd->prepare($sql);
            $requete->execute(array(':jeu' => $jeuDemande, ':cb' => $postCodeBarre, ':comment' => $postComment));
            $codeMessage = "formCreerExOK";
            redirection("exemplaires-{$infosJeu['id']}");
          }
          else {
            // Eeeh ... zut. Exemplaire déjà existant.
            $codeMessage = "formCreerExCBDejaPris";

          }
        }
      }
      else {
        $infosJeu = null;
        $codeMessage = "jeuInvalide";
      }
  }
  else {
    $jeuDemande = -1;
    $codeMessage = "pasDeParametre";
  }

?>

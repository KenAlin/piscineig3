<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Ajouter un membre";

  if ($actionPost == "create") {
    // On arrive depuis le formulaire : on va sécuriser quelques données ...
    if (isset($_POST["pseudo"])) {
      $postPseudo = strtolower(trim(htmlentities($_POST["pseudo"])));
    } else { $postPseudo = false; }

    if ($postPseudo) {
      // Le formulaire ne semble pas incomplet : on va chercher en BD les infos sur un éventuel jeu qui porterait déjà ce nom
      $sql = 'SELECT * FROM ludo_utilisateurs WHERE pseudo = :pseudo;';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':pseudo' => $postPseudo));
      $resultsql = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (count($resultsql) == 0) {
        // Ok, pas de membre qui porte ce pseudo ! On va l'ajouter, ok ?
        $sql = 'INSERT INTO  ludo_utilisateurs (pseudo, password, estAdmin)  VALUES (:pseudo, :passwrd, :admin);';
        $requete = $bd->prepare($sql);
        $requete->execute(array(':pseudo' => $postPseudo, ':passwrd' => password_hash("HomoLudens", PASSWORD_DEFAULT), ':admin' => false));
        $codeMessage = "formCreerUserOK";
      }
      else {
        // Eeeh ... zut. Pseudo déjà pris.
        $codeMessage = "formCreerUserPseudoDejaPris";
      }
    }
    else {
      $codeMessage = "formIncomplet";
    }
  }

?>

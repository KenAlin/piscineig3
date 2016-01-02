<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Ajouter un membre";
  include_once("content/fonctions/membres.php");

  if ($actionPost == "create") {
    // On arrive depuis le formulaire : on va sécuriser quelques données ...
    if (isset($_POST["pseudo"])) {
      $postPseudo = strtolower(trim(htmlentities($_POST["pseudo"])));
    } else { $postPseudo = false; }

    if ($postPseudo) {
      if (!infosMembreDepuisPseudo($postPseudo)) {
        // Ok, pas de membre qui porte ce pseudo ! On va l'ajouter, ok ?
        $sql = 'INSERT INTO  ludo_utilisateurs (pseudo, password, estAdmin, membre_depuis)  VALUES (:pseudo, :passwrd, :admin, :maintenant);';
        $requete = $bd->prepare($sql);
        $requete->execute(array(':pseudo' => $postPseudo, ':passwrd' => password_hash("HomoLudens", PASSWORD_DEFAULT), ':admin' => false, ':maintenant' => time()));
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

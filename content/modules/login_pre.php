<?php

  // *** INFOS SUR LE MODULE ***
  $titrePage = "Connexion";

  if ($actionPost == "connexion") {
    // On arrive depuis le formulaire : on va sécuriser quelques données ...
    if (isset($_POST["pseudo"])) {
      $postPseudo = trim(htmlentities($_POST["pseudo"]));
    } else { $postPseudo = false; }
    if (isset($_POST["pass"])) {
      $postPass = trim(htmlentities($_POST["pass"]));
    } else { $postPass = false; }

    if ($postPass && $postPseudo) {
      // Le formulaire ne semble pas incomplet : on va chercher en BD les infos sur l'utilisateur dont on a le pseudo
      $sql = 'SELECT * FROM ludo_utilisateurs WHERE pseudo = :pseudo;';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':pseudo' => $postPseudo));
      $infosUtilisateur = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (count($infosUtilisateur) == 1) {
        if (password_verify($postPass, $infosUtilisateur[0]["password"])) {
          // Mot de passe valide : l'utilisateur peut se connecter
          $_SESSION['estEnLigne'] = true;
          $_SESSION['estAdmin'] = $infosUtilisateur[0]["estAdmin"];

          // Redirection vers le catalogue
          redirection("catalogue");
        }
        else {
          // Mot de passe invalide !
          $codeMessage = "formLoginMauvaisMdp";
        }
      }
      else {
        $codeMessage = "formLoginUtilisateurIntrouvable";
      }
    }
    else {
      $codeMessage = "formIncomplet";
    }
  }
?>

<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Nouveau prêt";
  include_once("content/fonctions/membres.php");
  include_once("content/fonctions/jeux.php");

  // CONTEXTE :
  //    0 : Simple formulaire de saisie de code barre ("init")
  //    1 : Saisie du pseudo de l'emprunteur et de la date de retour prévue
  //    2 : Confirmation finale
  $contexte = 0;

  // Initialisations diverses
  $infosJeu = null;
  $infosEx = null;
  $dejaEnPret = false;
  $infosUser = null;
  $postDuree = false;

  if ($actionPost == "confirm") {
    // On arrive du formulaire de confirmation, en toute fin
    if (isset($_POST["code_barre"])) {
      $postCB = trim(htmlentities($_POST["code_barre"]));
    } else { $postCB = false; }
    if (isset($_POST["emprunteur"])) {
      $postEmprunteur = trim(htmlentities($_POST["emprunteur"]));
    } else { $postEmprunteur = false; }
    if (isset($_POST["duree"])) {
      $postDuree = intval($_POST["duree"]);
    } else { $postDuree = false; }

    if ($postCB && $postEmprunteur && $postDuree) {
      // Calcul de la date de fin de prêt
      $finPret = time() + 60*60*24*$postDuree;
      $finPret = strtotime("tomorrow", $finPret) - 1; // Obtient 23:59:59 du dernier jour du prêt

      // On veut l'id d'exemplaire désigné par le CB
      $exemplaire = infosExemplaireDepuisCodeBarres($postCB);

      // On enregistre le prêt !
      $sql = 'INSERT INTO  ludo_emprunts (dateDebut, dateFin, dateRetour, pseudo, idExemplaire)  VALUES (:debut, :fin, NULL, :pseudo, :exemplaire);';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':debut' => time(), ':fin' => $finPret, ':pseudo' => $postEmprunteur, ':exemplaire' => $exemplaire["idEx"]));
      $codeMessage = "formPretOK";
    }
  }


  else if ($actionPost == "shop") {
    // Vérifier que le CB est valide
    if (isset($_POST["code_barre"])) {
      $postCB = trim(htmlentities($_POST["code_barre"]));
    } else { $postCB = false; }

    if ($postCB) {
      $infosEx = infosExemplaireDepuisCodeBarres($postCB);

      if ($infosEx) {
        $contexte = 1;

        // Cherche si l'exemplaire est déjà emprunté (normalement non)
        $sql = 'SELECT * FROM ludo_emprunts WHERE idExemplaire=:idex AND dateRetour IS NULL;';
        $requete = $bd->prepare($sql);
        $requete->bindValue(':idex', $infosEx["idEx"], PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_ASSOC);

        if (isset($result[0])) {
          // Oops ! Cet exemplaire est déjà en emprunté ?!
          $codeMessage = "pretCBdejaEnPret";
          $dejaEnPret = true;
        }

        // On cherche les infos du jeu
        $infosJeu = infosJeuDepuisId($infosEx["idJeu"]);
      }
      else {
        // Erreur : CB inexistant
        $codeMessage = "pretCBinexistant";
      }
    }
    else {
      // Erreur : CB invalide
      $codeMessage = "formIncomplet";
    }
  }

  if ($contexte == 1) {
    // Vérifier que le pseudo saisi est valide ... on y sera pas quand on n'a fait que saisir le CB
    if (isset($_POST["pseudo"])) {
      $postPseudo = trim(htmlentities($_POST["pseudo"]));
    } else { $postPseudo = false; }
    if (isset($_POST["forcePret"])) {
      $postForcePret = intval($_POST["forcePret"]);
    } else { $postForcePret = false; }
    if (isset($_POST["duree"])) {
      $postDuree = intval($_POST["duree"]);
    } else { $postDuree = false; }

    if ($postPseudo) {
      // On cherche les infos du membre
      $infosUser = infosMembreDepuisPseudo($postPseudo);

      if ($infosUser) {
        // Autorisé à emprunter :
        //    soit estAdmin
        //    soit adhésion encore valable && (soit pretsEnCours < pretsMax / soit tentative d'emprunt d'une extension d'un   jeu déjà en cours d'emprunt)
        //    soit forçage

        $empruntPossible = empruntPossible($infosUser, $infosJeu, $postForcePret);
        if ($empruntPossible === true) {
          $contexte = 2;
          if ($postDuree > $settings["nbJoursMaxPrets"]) $postDuree = $settings["nbJoursMaxPrets"];
        }
        else {
          if ($empruntPossible == "ADHESION_TERMINEE") $codeMessage = "pretAboFini";
          else if ($empruntPossible == "NB_PRETS_MAX_ATTEINT") $codeMessage = "pretNbPretsMaxAtteint";
          else $codeMessage = "erreurInconnue";
        }

      }
      else {
        // Erreur : pseudo ne correspondant à personne !!
        $codeMessage = "pretCBpseudoIntrouvable";
      }
    }
  }

?>
